<div class="w-full p-4 flex flex-col justify-center">
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <form wire:submit.prevent="updateProfile" class="flex flex-col justify-between">
        <div class="flex flex-col">
            <div class="flex flex-col">
                <label class="text-base ">Nama Lengkap</label>
                <input type="text" wire:model="username"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" placeholder="Masukan nama lengkap anda">
                @error('username')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mt-4">
                <label class="text-base ">Email</label>
                <input type="email" wire:model="email"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" placeholder="Masukan email anda">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mt-4">
                <label class="text-base ">Nomor HP aktif</label>
                <input type="number" wire:model="nohp"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" placeholder="Masukan nomor hp anda">
                @error('nohp')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mt-4">
                <label class="text-base ">Kelas</label>
                <input type="text" wire:model="kelas"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" placeholder="Contoh : XII PPLG 2">
                @error('kelas')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mt-4">
                <label class="text-base ">Kata sandi</label>
                <input type="password" wire:model="password"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" placeholder="Masukan kata sandi anda">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mt-4">
                <label class="text-base ">Konfirmasi Kata sandi</label>
                <input type="password" wire:model="cpassword"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" placeholder="Masukan konfirmasi kata sandi anda">
                @error('cpassword')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-8">
            <button type="submit" wire:loading.attr="disabled" wire:target="updateProfile" class="w-full py-4 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-md flex justify-center items-center disabled:opacity-75 disabled:cursor-not-allowed">
                <span wire:loading wire:target="updateProfile">
                    <i class="ph ph-circle-notch animate-spin text-xl"></i>
                </span>
                <span wire:loading.remove wire:target="updateProfile">
                    Perbarui
                </span>
            </button>
        </div>
    </form>
</div>