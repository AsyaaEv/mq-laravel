<div class="w-full flex flex-col pb-[4rem] p-4">
    <div class="w-full flex gap-2">
        <div class="w-[4rem] h-[4rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
            <img src="{{ Storage::url('assets/images/pp1.png') }}" alt="Profile Picture"
                class="object-cover w-[5.5rem] h-[5.5rem]">
        </div>
        <div class="flex flex-col justify-center ">
            <h1 class="font-bold text-xl">{{ $store->user->username }}</h1>
            <p>{{ $store->user->nohp }}</p>
        </div>
    </div>
    <hr class="mt-4">
    <div class="w-full flex flex-col mt-4">
        <div class="w-full flex gap-2 items-center justify-start">
            <i class="ph-fill ph-user-list text-3xl text-amber-500"></i>
            <p class="w-full">Informasi Pengguna</p>
        </div>
        <div class="w-full p-2 bg-gray-100 rounded-md flex flex-col gap-2">
            <p class="">Nama Lengkap : {{ $store->user->username }}</p>
            <p class="">Email : {{ $store->user->email }}</p>
            <p class="pointer-events-none">Nomor HP : {{ $store->user->nohp }}</p>
            <p class="">Kelas : {{ $store->user->kelas }}</p>
            <p class="">Bergabung pada : {{ $store->user->created_at->format('d M Y') }}</p>
        </div>
    </div>
    @if ($store)
        <div class="w-full flex flex-col mt-8">
            <div class="w-full flex gap-2 items-center justify-start">
                <i class="ph-fill ph-storefront text-3xl text-amber-500"></i>
                <p class="w-full">Informasi Toko</p>
            </div>
            <div class="w-full flex gap-2 mt-4 justify-between">
                <div class="w-full flex gap-2">
                    <div class="w-fit h-[4rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
                        <img src="{{ $store->image ? Storage::url($store->image) : Storage::url('assets/images/logotoko.png') }}"
                            class="object-cover w-[5.5rem] h-[5.5rem]">
                    </div>
                    <div class="w-full flex flex-col justify-center ">
                        <div class="flex gap-2">
                            <h1 class="font-bold text-xl">{{ $store->name }}</h1>
                        </div>
                        <p>{{ $store->description }}</p>
                    </div>
                </div>
                <div class="flex gap-2 w-fit">
                    {{-- <div class="flex items-center justify-center">
                        <button type="button" x-data="{ liked: localStorage.getItem('store_{{ $store->id }}_liked') === 'true' }"
                            @click.prevent="
                                    if (!liked) {
                                        $wire.like();
                                        localStorage.setItem('store_{{ $store->id }}_liked', 'true');
                                    } else {
                                        $wire.unlike();
                                        localStorage.removeItem('store_{{ $store->id }}_liked');
                                    }
                                    liked = !liked;
                                "
                            :class="{ 'opacity-50': liked }">
                            <i class="ph" :class="liked ? 'ph-heart-fill text-red-500 text-3xl' : 'ph-heart text-3xl'"></i>
                        </button>
                        <p class="text-sm">{{ $store->like }}</p>
                    </div> --}}
                    {{-- <button 
                            x-data
                            @click.prevent="navigator.clipboard.writeText(window.location.href).then(() => $dispatch('notify', { message: 'Link berhasil disalin ke clipboard!' }))">
                            <i class="ph ph-clipboard text-3xl"></i>
                        </button> --}}
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col mt-4">
            <div class="flex justify-start items-center mt-4 gap-2">
                <i class="ph ph-shopping-bag text-3xl text-amber-500"></i>
                <p class="">Produk Toko</p>
            </div>
            @if ($products->isEmpty())
                <div class="w-full top-[20rem] mt-8 flex justify-center items-center">
                    <span class="text-gray-500 text-base">Tidak ada produk yang tersedia</span>
                </div>
            @endif
            <div class="w-full grid grid-cols-2 gap-2 mt-4">
                @foreach ($products as $product)
                    <a href="{{ route('productview', $product->id) }}" class="w-full rounded-md flex flex-col">
                        <div class="w-full h-full bg-white shadow rounded-md flex flex-col">
                            <div class="w-full h-[10rem] bg-white rounded-tl-md rounded-tr-md">
                                <img src="{{ $product->image ? Storage::url($product->image) : Storage::url('assets/images/logotoko.png') }}"
                                    alt="Profile Picture"
                                    class="object-cover w-full h-full rounded-tl-md rounded-tr-md">
                            </div>
                            <div class="w-full p-2 flex flex-col">
                                <p class="text-base">{{ $product->name }}</p>
                                <p class="font-bold text-xl">{{ $product->price }}</p>
                                @if ($product->iscod == 1)
                                    <div
                                        class="w-fit bg-amber-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                                        <p class="text-sm">Bisa COD</p>
                                    </div>
                                @endif
                                <p class="mt-2 text-sm">{{ $product->soldout }}x Terpesan</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
