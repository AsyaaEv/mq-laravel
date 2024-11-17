<?php

namespace App\Livewire\Store;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mystore extends Component
{
    public function render()
    {
        $store = Store::where('user_id', Auth::user()->id)->first();
        $products = Product::where('store_id', $store->id)->get();
        return view('livewire.store.mystore', compact('store', 'products'));
    }
}
