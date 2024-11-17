<?php

namespace App\Livewire\Store;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditStore extends Component
{
    use WithFileUploads;

    public $storename, $storedescription, $image, $imageNew;

    public function mount()
    {
        $store = Store::where('user_id', Auth::user()->id)->first();
        $this->storename = $store->name;
        $this->storedescription = $store->description;
        $this->image = $store->image;
    }

    public function rules()
    {
        return [
            'storename' => 'required|string|max:20',
            'storedescription' => 'required|string|max:80',
            'image' => 'nullable|image|max:1024', // Ubah batas ukuran gambar menjadi 1024
        ];
    }

    public function messages()
    {
        return [
            'storename.required' => 'Nama toko wajib diisi',
            'storename.max' => 'Nama toko maksimal 20 karakter',
            'storedescription.required' => 'Deskripsi toko wajib diisi',
            'storedescription.max' => 'Deskripsi toko maksimal 80 karakter',
            'image.image' => 'Format gambar tidak valid',
            'image.max' => 'Gambar maksimal 1MB', // Ubah pesan untuk batas ukuran gambar
        ];
    }

    public function updateStore(){
        $this->validate();

        $store = Store::where('user_id', Auth::user()->id)->first();

        $imagePath = $this->image;
        if ($this->imageNew) {
            if ($store->image && $store->image !== null) {
                Storage::disk('public')->delete($store->image);
            }
            $imagePath = $this->imageNew->store('store/images', 'public');
        }

        $store->update([
            'name' => $this->storename,
            'description' => $this->storedescription,
            'image' => $imagePath,
        ]);

        return redirect()->route('mystore');
    }
    public function render()
    {
        return view('livewire.store.edit-store');
    }
}
