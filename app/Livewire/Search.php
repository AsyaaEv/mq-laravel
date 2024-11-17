<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Store;

class Search extends Component
{
    public $option = 'product';
    public $keysearch = null;
    public $searchResults = [];

    public function optionTab($tab)
    {
        $this->option = $tab;
        $this->search(); // Trigger search when tab changes
    }

    public function updatedKeysearch()
    {
        $this->search(); // Trigger search when input changes
    }

    public function search()
    {
        if (empty($this->keysearch) || empty($this->option)) {
            $this->searchResults = [];
            return;
        }

        $searchTerm = '%' . $this->keysearch . '%';

        if ($this->option === 'product') {
            $this->searchResults = Product::where('name', 'like', $searchTerm)
                ->orWhere('price', 'like', $searchTerm)
                ->limit(10)
                ->get();
        } elseif ($this->option === 'store') {
            $this->searchResults = Store::where('name', 'like', $searchTerm)
                ->limit(10)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}