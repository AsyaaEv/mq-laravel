<?php

namespace App\Livewire;

use App\Models\Store as ModelsStore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;
    
    public $hasMorePages;
    public $perPage = 12;
    public $userStore = null;

    public function mount()
    {
        $this->hasMorePages = true;
        if (Auth::check()) {
            $this->userStore = ModelsStore::where('user_id', Auth::user()->id)->first();
        }
    }

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        $stores = ModelsStore::paginate($this->perPage);
        $this->hasMorePages = $stores->hasMorePages();
        
        return view('livewire.store', [
            'stores' => $stores,
            'store' => $this->userStore
        ]);
    }
}