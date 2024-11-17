<div class="w-full flex flex-col px-4">
    <a href="{{ route('editstore') }}">
        <div class="w-full flex gap-2 mt-4">
            <div class="w-[4rem] h-[4rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
                <img src="{{ $store->image ? Storage::url($store->image) : Storage::url('assets/images/logotoko.png') }}"
                    class="object-cover w-[5.5rem] h-[5.5rem]">
            </div>
            <div class="w-fit flex flex-col justify-center ">
                <div class="flex gap-2">
                    <h1 class="font-bold text-xl">{{ $store->name }}</h1>
                    <div class="bg-amber-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                        <p class="text-sm">{{ $store->tier == 0 ? 'Gratis' : 'Langganan' }}</p>
                    </div>
                </div>
                <p>{{ $store->description }}</p>
            </div>
        </div>
    </a>
    <hr class="mt-4">
    <div class="flex justify-start items-center mt-4 gap-2">
        <i class="ph ph-shopping-bag text-3xl text-amber-500"></i>
        <div class="flex gap-2">
            <p class="">Total Produk Anda</p>
            <p class="font-bold text-sky-500">{{ $products->count() }}</p>
        </div>
    </div>
    @if ($products->isEmpty())
        <div class="w-full top-[20rem] mt-8 flex justify-center items-center">
            <span class="text-gray-500 text-base">Tidak ada produk yang tersedia</span>
        </div>
    @endif
    <div class="w-full grid grid-cols-2 gap-2 pb-[4rem] mt-4">
        @foreach ($products as $product)
            <a href="{{ route('editproduct', ['id' => $product->id]) }}">
                <div class="w-full bg-white shadow rounded-md flex flex-col">
                    <div class="w-full h-[10rem] bg-white rounded-tl-md rounded-tr-md">
                        <img src="{{ $product->image ? Storage::url($product->image) : Storage::url('assets/images/logotoko.png') }}"
                            alt="Profile Picture" class="object-cover w-full h-full rounded-tl-md rounded-tr-md">
                    </div>
                    <div class="w-full p-2 flex flex-col">
                        <p class="text-base">{{ $product->name }}</p>
                        <p class="font-bold text-xl">{{ $product->price }}</p>
                        <div class="w-fit flex gap-2">
                            <div
                                class="w-fit bg-amber-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                                <p class="text-sm">Stock {{ $product->stock }}</p>
                            </div>
                        </div>
                        <p class="mt-2 text-sm">{{ $product->soldout }} Terpesan</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="fixed w-full bottom-0 left-0 right-0">
        <div class="w-full mt-8 flex justify-center items-center ">
            <a href="{{ route('addproduct', ['id' => $store->id]) }}"
                class="w-full flex gap-2 items-center justify-center bg-amber-500 py-4 rounded-md text-white font-bold m-4">
                <i class="ph-fill ph-storefront text-xl"></i>
                <h1>Tambah Product</h1>
            </a>
        </div>
    </div>
</div>
