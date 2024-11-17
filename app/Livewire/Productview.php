<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Productview extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function order(){
        $product = Product::findOrFail($this->id);
        $product->increment('soldout');
        if($product->stock > 0){
            $product->decrement('stock');
        }else {
            $product->stock = 0;
        }
        $product->save();
    }

    
    public function like()
    {
        $store = Product::findOrFail($this->id);
        $store->increment('like');
    }

    public function unlike()
    {
        $store = Product::findOrFail($this->id);
        $store->decrement('like');
    }

    public function render()
    {
        $product = Product::with('store')->findOrFail($this->id);
        $products = Product::where('id', '!=', $this->id)->get();
        return view('livewire.productview', compact('product', 'products'));
    }
}
