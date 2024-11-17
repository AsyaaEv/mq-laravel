<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $username;
    public $email;
    public $password;
    public $nohp;
    public $kelas;
    public $cpassword;

    protected $rules = [
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'nohp' => 'required|string|min:8|unique:users',
        'kelas' => 'required|string|max: 10',
        'password' => 'required|string|min:6',
        'cpassword' => 'required_with:password|same:password'
    ];

    protected $messages = [
        'username.required' => 'Nama lengkap wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'nohp.required' => 'Nomor HP wajib diisi',
        'nohp.min' => 'Nomor HP minimal 8 karakter',
        'nohp.unique' => 'Nomor HP sudah terdaftar',
        'kelas.required' => 'Kelas wajib diisi',
        'kelas.max' => 'Kelas maksimal 10 karakter',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 6 karakter',
        'cpassword.required_with' => 'Konfirmasi password wajib diisi',
        'cpassword.same' => 'Konfirmasi password harus sama dengan password',
    ];

    public function register()
    {
        $this->validate();

        try {
            $user = User::create([
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'nohp' => $this->nohp,
                'kelas' => $this->kelas,
                'role' => 'user',
                'profile' => '',
            ]);

            Auth::login($user);
            session()->flash('success', 'Berhasil membuat akun baru!');
            return redirect()->route('home', ['tab' => 'profile']);
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Terjadi kesalahan saat mendaftar.');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
