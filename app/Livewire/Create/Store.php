<?php

namespace App\Livewire\Create;

use App\Models\Store as ModelsStore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $storename;
    public $storedescription;
    public $image = null;

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
    public function CreateStore()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('store/images', 'public');
        }

        ModelsStore::create([
            'name' => $this->storename,
            'description' => $this->storedescription,
            'image' => $imagePath,
            'user_id' => Auth::user()->id,
        ]);
        session()->flash('success', 'Berhasil membuat toko!');
        return redirect()->route('home', ['tab' => 'profile']);
    }
    public function render()
    {
        return view('livewire.create.store');
    }
}
