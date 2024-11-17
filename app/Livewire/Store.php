<?php

namespace App\Livewire;

use App\Models\Store as ModelsStore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Store extends Component
{
    public function render()
    {
        $stores = ModelsStore::all();
        $store = null;

        if (Auth::check()) {
            $store = ModelsStore::where('user_id', Auth::user()->id)->first();
        }
        return view('livewire.store', compact('stores', 'store'));
    }
}
