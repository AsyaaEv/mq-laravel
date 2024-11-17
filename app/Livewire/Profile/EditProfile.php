<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditProfile extends Component
{
    public $username;
    public $email;
    public $password;
    public $nohp;
    public $kelas;
    public $cpassword;

    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'nohp' => 'required|string|min:8|unique:users,nohp,' . Auth::id(),
            'kelas' => 'required|string|max:10',
            'password' => 'nullable|string|min:6',
            'cpassword' => 'required_with:password|same:password'
        ];
    }

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
        'password.min' => 'Password minimal 6 karakter',
        'cpassword.required_with' => 'Konfirmasi password wajib diisi',
        'cpassword.same' => 'Konfirmasi password harus sama dengan password',
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->username;
        $this->email = $user->email;
        $this->nohp = $user->nohp;
        $this->kelas = $user->kelas;
    }

    public function updateProfile()
    {
        $this->validate();
        $user = User::findOrFail(Auth::user()->id);
        $updateData = [
            'username' => $this->username,
            'email' => $this->email,
            'nohp' => $this->nohp,
            'kelas' => $this->kelas,
        ];
        if ($this->password) {
            $updateData['password'] = Hash::make($this->password);
        }
        $user->update($updateData);

        session()->flash('success', 'Berhasil memperbarui profil anda!');
        return redirect()->route('home', ['tab' => 'profile']);
    }
    public function render()
    {
        return view('livewire.profile.edit-profile');
    }
}
