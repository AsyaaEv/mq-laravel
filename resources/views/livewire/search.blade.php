<div class="w-full flex flex-col pb-[4rem]">
    <div class="flex flex-col relative">
        <input type="text" wire:model.live.debounce.500ms="keysearch"
            class="w-full mt-2 p-4 border rounded-md outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 pl-12 pr-4"
            id="email" placeholder="Cari">
        <div class="absolute top-[1.5rem] left-4">
            <i class="ph ph-magnifying-glass text-2xl"></i>
        </div>
    </div>
    <div class="w-full flex gap-2 mt-4">
        <button type="button" wire:click="optionTab('product')"
            class="py-2 px-4 rounded-md font-bold {{ $option === 'product' ? 'bg-amber-500 text-white' : 'bg-gray-100' }}">
            <h1 class="pointer-events-none">Produk</h1>
        </button>
        <button type="button" wire:click="optionTab('store')"
            class="py-2 px-4 rounded-md font-bold {{ $option === 'store' ? 'bg-amber-500 text-white' : 'bg-gray-100' }}">
            <h1 class="pointer-events-none">Toko</h1>
        </button>
    </div>
    <hr class="mt-4">

    @if ($keysearch == null)
        <div class="w-full top-[20rem] mt-8 flex justify-center items-center">
            <span class="text-gray-500 text-base">Masukan kata kunci pencarian</span>
        </div>
    @elseif($option == null)
        <div class="w-full top-[20rem] mt-8 flex justify-center items-center">
            <span class="text-gray-500 text-base">Pilih opsi pencarian</span>
        </div>
    @else
        <div class="mt-4">
            @if (count($searchResults) > 0)
                <div class="w-full grid grid-cols-2 gap-2">
                    @foreach ($searchResults as $result)
                        <div class="w-full">
                            @if ($option === 'product')
                                <a href="{{ route('productview', $result->id) }}" class="w-full h-full">
                                    <div class="w-full h-full bg-white shadow rounded-md flex flex-col">
                                        <div class="w-full bg-white rounded-tl-md rounded-tr-md">
                                            <img src="{{ $result->image ? Storage::url($result->image) : Storage::url('assets/images/logotoko.png') }}"
                                                alt="Profile Picture" loading="lazy"
                                                class="object-cover w-full h-full rounded-tl-md rounded-tr-md aspect-square">
                                        </div>
                                        <div class="w-full p-2 flex flex-col">
                                            <p class="text-base">{{ $result->name }}</p>
                                            <p class="font-bold text-xl">{{ $result->price }}</p>
                                            @if ($result->iscod == 1)
                                                <div
                                                    class="w-fit bg-amber-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                                                    <p class="text-sm">Bisa COD</p>
                                                </div>
                                            @endif
                                            <p class="mt-2 text-sm">{{ $result->soldout }} Terpesan</p>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="{{ route('storeview', ['id' => $result->id]) }}">
                                    <div class="w-full h-full bg-white shadow rounded-md flex flex-col">
                                        <div class="w-full bg-white rounded-tl-md rounded-tr-md">
                                            <img src="{{ $result->image ? Storage::url($result->image) : Storage::url('assets/images/logotoko.png') }}"
                                                alt="Profile Picture"
                                                class="object-cover w-full h-full rounded-tl-md rounded-tr-md aspect-square">
                                        </div>
                                        <div class="w-full p-2 flex flex-col">
                                            <p class="font-bold text-xl">{{ $result->name }}</p>
                                            <p class="text-base">{{ Str::limit($result->description, 30) }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="w-full flex justify-center items-center mt-4">
                    <span class="text-gray-500">Tidak ada hasil ditemukan</span>
                </div>
            @endif
        </div>
    @endif
</div>
