<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeProduct extends Component
{
    use WithFileUploads;

    public $id, $name, $description, $price, $image, $iscod, $stock, $imageNew;
    public $isDataLoaded = false, $showDeleteModal = false; // Tambahkan flag

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|min:0',
        'stock' => 'required|integer',
        'imageNew' => 'nullable|image|max:1024',
    ];

    protected $messages = [
        'name.required' => 'Nama produk wajib diisi',
        'name.max' => 'Nama produk maksimal 255 karakter',
        'description.required' => 'Deskripsi produk wajib diisi',
        'description.max' => 'Deskripsi produk maksimal 255 karakter',
        'price.required' => 'Harga produk wajib diisi',
        'price.min' => 'Harga produk minimal 0 Rp',
        'stock.required' => 'Stock produk wajib diisi',
        'stock.integer' => 'Stock produk harus berupa angka',
        'imageNew.image' => 'Format gambar tidak valid',
        'imageNew.max' => 'Gambar maksimal 1MB',
    ];

    public function mount($id)
    {
        $this->id = $id;
        // Pindahkan pengambilan data ke mount
        $product = Product::findOrFail($this->id);
        $this->image = $product->image;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->iscod = $product->iscod == 1 ? true : false;
        $this->isDataLoaded = true;
    }

    public function confirmDelete($id)
    {
        $this->showDeleteModal = true;
    }

    public function deleteProduct(){
        $product = Product::findOrFail($this->id);
        $product->delete();
        $this->showDeleteModal = false;
        return redirect()->route('mystore');
    }

    // Hapus pengambilan data di render
    public function render()
    {
        return view('livewire.product.change-product');
    }

    // Ganti formatPrice menjadi:
    public function formatPrice()
    {
        if (!$this->price) return;

        // Hapus format Rupiah yang ada
        $price = preg_replace('/[^0-9]/', '', $this->price);

        // Format ulang ke Rupiah
        if ($price !== '') {
            $this->price = 'Rp ' . number_format((int)$price, 0, ',', '.');
        }
    }

    public function updateProduct()
    {
        $this->validate();

        $product = Product::findOrFail($this->id);
        $imagePath = $this->image;
        if ($this->imageNew) {
            // Hapus image lama
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $this->imageNew->store('product/images', 'public');
        }

        $product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
            'iscod' => $this->iscod,
            'stock' => $this->stock,
        ]);

        return redirect()->route('mystore');
    }
}
