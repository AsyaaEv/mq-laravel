<?php

namespace App\Livewire\Store;

use App\Models\Product;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Storeview extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function like()
    {
        $store = Store::findOrFail($this->id);
        $store->increment('like');
    }

    public function unlike()
    {
        $store = Store::findOrFail($this->id);
        $store->decrement('like');
    }

    use WithPagination;

    public function render()
    {
        $store = Store::with('user')->findOrFail($this->id);
        $products = Product::where('store_id', $this->id)->get();
        return view('livewire.store.storeview', compact('store', 'products'));
    }
}
