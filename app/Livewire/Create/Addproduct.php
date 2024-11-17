<?php

namespace App\Livewire\Create;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addproduct extends Component
{
    use WithFileUploads;
    
    public $id, $name, $description, $price, $image, $iscod, $stock;
    public function mount($id)
    {
        $this->id = $id;
    }

    protected $rules = [
        'name' => 'required|string|max:80',
        'description' => 'required|string|max:255',
        'price' => 'required|min:0',
        'stock' => 'required|integer',
        'image' => 'required|image|max:1024', // Ubah batas ukuran gambar menjadi 1024
    ];

    protected $messages = [
        'name.required' => 'Nama produk wajib diisi',
        'name.max' => 'Nama produk maksimal 80 karakter',
        'description.required' => 'Deskripsi produk wajib diisi',
        'description.max' => 'Deskripsi produk maksimal 255 karakter',
        'price.required' => 'Harga produk wajib diisi',
        'price.min' => 'Harga produk minimal 0 Rp',
        'stock.required' => 'Stock produk wajib diisi',
        'stock.integer' => 'Stock produk harus berupa angka',
        'image.required' => 'Gambar produk wajib diisi',
        'image.image' => 'Format gambar tidak valid',
        'image.max' => 'Gambar maksimal 1MB', // Ubah pesan untuk batas ukuran gambar
    ];

    public function formatPrice()
    {
        // Hapus semua karakter non-angka
        $numericValue = preg_replace('/[^0-9]/', '', $this->price);
        
        // Jika ada nilai, format sebagai Rupiah
        if ($numericValue !== '') {
            $this->price = 'Rp ' . number_format((int)$numericValue, 0, ',', '.');
        }
    }
    public function addproduct($id)
    {
        $this->validate();

        if ($this->image) {
            $imagePath = $this->image->store('product/images', 'public');
        }

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
            'iscod' => $this->iscod,
            'stock' => $this->stock,
            'store_id' => $id,
        ]);

        return redirect()->route('mystore');
    }
    public function render()
    {
        return view('livewire.create.addproduct');
    }
}
