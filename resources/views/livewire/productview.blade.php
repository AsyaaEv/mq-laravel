<div class="w-full flex flex-col pb-[8rem]">
    <div class="w-full">
        <img src="{{ $product->image ? Storage::url($product->image) : Storage::url('assets/images/logotoko.png') }}"
            alt="Gambar Produk" class="object-cover w-full h-full aspect-square">
    </div>
    <div class="w-full flex flex-col p-4">
        <div class="w-full flex flex-col">
            <div class="flex gap-2">
                <h1 class="font-bold text-3xl">{{ $product->price }}</h1>
                @if ($product->iscod == 1)
                    <div class="w-fit bg-amber-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                        <p class="text-sm">Bisa COD</p>
                    </div>
                @endif
            </div>
            <div class="w-full flex justify-between items-center">
                <p class="text-xl">{{ $product->name }}</p>
                {{-- <div class="flex items-center justify-center">
                    <button type="button" x-data="{ liked: localStorage.getItem('store_{{ $product->id }}_liked') === 'true' }"
                        @click.prevent="
                                if (!liked) {
                                    $wire.like();
                                    localStorage.setItem('store_{{ $product->id }}_liked', 'true');
                                } else {
                                    $wire.unlike();
                                    localStorage.removeItem('store_{{ $product->id }}_liked');
                                }
                                liked = !liked;
                            "
                        :class="{ 'opacity-50': liked }">
                        <i class="ph" :class="liked ? 'ph-heart-fill text-red-500 text-3xl' : 'ph-heart text-3xl'"></i>
                    </button>
                    <p class="text-sm">{{ $product->like }}</p>
                </div> --}}
            </div>
            <div class="w-full flex gap-2 mt-4">
                <p class="mt-2">Terpesan {{ $product->soldout }} kali</p>
                <div class="w-fit bg-amber-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                    <p class="text-sm">Stock {{$product->stock}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-3 bg-slate-100"></div>
    <div class="w-full flex flex-col p-4 gap-2">
        <h1 class="text-2xl font-bold">Deskripsi Produk</h1>
        <p class="text-base">{{ $product->description }}</p>
    </div>
    <div class="w-full h-3 bg-slate-100"></div>
    <a href="{{ route('storeview', $product->store->id) }}" class="px-4">
        <div class="w-full flex flex-col  mt-4">
            <div class="w-full flex gap-2 items-center justify-start">
                <i class="ph-fill ph-storefront text-3xl text-amber-500"></i>
                <p class="w-full">Informasi Toko</p>
            </div>
            <div class="w-full flex gap-2 mt-4">
                <div
                    class="w-[4rem] h-[4rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
                    <img src="{{ $product->store->image ? Storage::url($product->store->image) : Storage::url('assets/images/logotoko.png') }}"
                        class="object-cover w-[5.5rem] h-[5.5rem]">
                </div>
                <div class="flex flex-col justify-center ">
                    <div class="flex gap-2">
                        <h1 class="font-bold text-xl">{{ $product->store->name }}</h1>
                    </div>
                    <p>{{ $product->store->description }}</p>
                </div>
            </div>
        </div>
    </a>
    <div class="w-full h-3 bg-slate-100 mt-4"></div>
    <div class="w-full flex flex-col p-4">
        <h1 class="text-2xl font-bold">Rekomendasi</h1>
        <div class="w-full grid grid-cols-2 gap-2 mt-4">
            @foreach ($products as $product)
        <div class="w-full rounded-md flex flex-col">
            <a href="{{ route('productview', $product->id) }}" class="w-full h-full">
                <div class="w-full h-full bg-white shadow rounded-md flex flex-col">
                    <div class="w-full bg-white rounded-tl-md rounded-tr-md">
                        <img src="{{ $product->image ? Storage::url($product->image) : Storage::url('assets/images/logotoko.png') }}"
                            alt="Profile Picture" loading="lazy"
                            class="object-cover w-full h-full rounded-tl-md rounded-tr-md aspect-square">
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
                        <p class="mt-2 text-sm">{{ $product->soldout }} Terpesan</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
        </div>
    </div>
    <div class="w-full fixed bottom-4 left-0 right-0 flex justify-center items-center">
        <a href="https://wa.me/{{ $product->store->user->nohp }}" wire:click="order" target="_blank"
            class="w-full flex gap-2 items-center justify-center bg-amber-500 py-4 rounded-md font-bold text-white mx-4">
            <i class="ph ph-whatsapp-logo text-3xl"></i>
            <h1 class="text-xl">Pesan</h1>
        </a>
    </div>
</div>
