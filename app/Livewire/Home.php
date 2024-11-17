<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    
    public $hasMorePages;
    public $perPage = 12;

    public function mount()
    {
        $this->hasMorePages = true;
    }

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        $products = Product::paginate($this->perPage);
        $this->hasMorePages = $products->hasMorePages();
        
        return view('livewire.home', [
            'products' => $products
        ]);
    }
}