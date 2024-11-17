<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Layout extends Component
{
    public string $activeTab = 'home';

    public function mount()
    {
        $this->activeTab = request()->query('tab', 'home');
    }

    public function setActiveTab($tab)
    {
        if ($tab == 'profile' && !Auth::check()) {
            return redirect()->route('login');
        }
        $this->activeTab = $tab;
        $this->dispatch('update-url', tabValue: $tab);
    }

    public function render()
    {
        return view('livewire.layout');
    }
}
