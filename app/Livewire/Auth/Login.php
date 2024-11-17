<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Login extends Component
{
    public $nohp, $password;

    public function rules()
    {
        return [
            'nohp' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nohp.required' => 'Nomor HP wajib diisi',
            'password.required' => 'Kata sandi wajib diisi',
        ];
    }

    public function login()
    {
        $validated = $this->validate();

        
        $user = User::where('nohp', $this->nohp)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('home', ['tab' => 'profile']);
            }
        }
        
        if (!$user || !Hash::check($this->password, $user->password)) {
            session()->flash('error', 'Nomor HP atau kata sandi tidak valid');
            return;
        }
    }

    public function render()
    {
        return view('livewire.auth.login',);
    }
}
