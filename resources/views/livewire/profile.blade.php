<div class="w-full flex flex-col pb-[4rem]">
    <div class="w-full flex gap-2">
        <div class="w-[4rem] h-[4rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
            <img src="{{ Storage::url('assets/images/pp1.png') }}" alt="Profile Picture"
                class="object-cover w-[5.5rem] h-[5.5rem]">
        </div>
        <div class="flex flex-col justify-center ">
            <h1 class="font-bold text-xl">{{ $user->username }}</h1>
            <p>{{ $user->nohp }}</p>
        </div>
    </div>
    <hr class="mt-4">
    <div class="w-full flex flex-col mt-4">
        <div class="w-full flex gap-2 items-center justify-start">
            <i class="ph-fill ph-user-list text-3xl text-amber-500"></i>
            <p class="w-full">Informasi Pengguna</p>
        </div>
        <div class="w-full p-2 bg-gray-100 rounded-md flex flex-col gap-2">
            <p class="">Nama Lengkap : {{ $user->username }}</p>
            <p class="">Email : {{ $user->email }}</p>
            <p class="pointer-events-none">Nomor HP : {{ $user->nohp }}</p>
            <p class="pointer-events-none">Kelas : {{ $user->kelas }}</p>
            <p class="">Bergabung pada : {{ $user->created_at->format('d M Y') }}</p>
        </div>
    </div>
    @if ($store)
        <a href="{{ route('mystore') }}">
            <div class="w-full flex flex-col mt-8">
                <div class="w-full flex gap-2 items-center justify-start">
                    <i class="ph-fill ph-storefront text-3xl text-amber-500"></i>
                    <p class="w-full">Informasi Toko</p>
                </div>
                <div class="w-full flex gap-2 mt-4">
                    <div
                        class="w-[4rem] h-[4rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
                        <img src="{{ $store->image ? Storage::url($store->image) : Storage::url('assets/images/logotoko.png') }}"
                            class="object-cover w-[5.5rem] h-[5.5rem]">
                    </div>
                    <div class="w-fit flex flex-col justify-center ">
                        <div class="flex gap-2">
                            <h1 class="font-bold text-xl">{{ $store->name }}</h1>
                            <div class="bg-green-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                                <p class="text-sm">{{ $store->tier == 0 ? 'Gratis' : 'Langganan' }}</p>
                            </div>
                        </div>
                        <p>{{ $store->description }}</p>
                    </div>
                </div>
            </div>
        </a>
    @endif
    @if (!$store)
        <div class="w-full mt-8 flex justify-center items-center">
            <a href="{{ route('store') }}"
                class="w-full flex gap-2 items-center justify-center bg-sky-500 py-4 rounded-md text-white font-bold">
                <i class="ph-fill ph-storefront text-xl"></i>
                <h1>Buat Toko</h1>
            </a>
        </div>
    @endif
    <div class="w-full absolute bottom-[4.5rem] left-0 right-0 flex justify-center items-center">
        <button wire:click='logout'
            class="w-full flex gap-2 items-center justify-center border-2 border-red-500 py-2 rounded-md font-bold text-red-500 mx-4">
            <i class="ph ph-door text-xl"></i>
            <h1>Keluar</h1>
        </button>
    </div>
</div>
