<?php

namespace App\Livewire;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function render()
    {
        $user = Auth::user();
        $store = Store::where('user_id', $user->id)->first();
        return view('livewire.profile', compact('user', 'store'));
    }
}
