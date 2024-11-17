<div class="w-full p-4 flex flex-col justify-center">
    <div class="flex flex-col">
        <h1 class="font-bold text-xl">Selamat datang di <span class="text-amber-500">MarketQue</span></h1>
        <p class="text-sm">Silakan masukan data anda untuk melanjutkan ke MarketQue</p>
    </div>
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <form wire:submit.prevent="login" class="mt-8 flex flex-col justify-between">
        <div class="flex flex-col">
            <div class="flex flex-col">
                <label for="email" class="text-base ">Nomor HP</label>
                <input type="number" wire:model="nohp"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                    id="email" placeholder="Masukan nomor hp anda">
                @error('nohp')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mt-4">
                <label for="email" class="text-base ">Kata sandi</label>
                <input type="password" wire:model="password"
                    class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                    id="email" placeholder="Masukan kata sandi anda">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-8">
            <button type="submit"
                class="w-full py-4 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-md">Masuk</button>
        </div>
    </form>
    <div class="flex justify-end mt-4">
        <p class="text-sm">Belum punya akun?<a href="{{ route('register') }}"
                class="text-amber-500 hover:underline ml-2">Daftar baru</a></p>
    </div>
</div>
