<div class="w-full grid grid-cols-2 gap-2 pb-[4rem]">
    @if ($products->isEmpty())
        <div class="absolute w-full top-[20rem] left-0 right-0 flex justify-center items-center">
            <span class="text-gray-500 text-base">Tidak ada produk yang tersedia</span>
        </div>
    @endif
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
