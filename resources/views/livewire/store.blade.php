<div
    x-data="{
        observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        $wire.loadMore()
                    }
                })
            }, {
                root: null,
                threshold: 0.5
            })
            
            observer.observe(this.$el)
        }
    }"
    class="w-full flex flex-col"
>
    @if ($store)
        <a href="{{ route('mystore') }}">
            <div class="w-full flex flex-col pb-4">
                <div class="w-full flex gap-2 items-center">
                    <i class="ph-fill ph-storefront text-3xl text-amber-500"></i>
                    <p>Toko Anda</p>
                </div>
                <div class="w-full flex gap-2 mt-4">
                    <div class="w-[4rem] h-[4rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
                        <img src="{{ $store->image ? Storage::url($store->image) : Storage::url('assets/images/logotoko.png') }}"
                            class="object-cover w-[5.5rem] h-[5.5rem]">
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="flex gap-2">
                            <h1 class="font-bold text-xl">{{ $store->name }}</h1>
                            <div class="bg-green-100 rounded-md px-2 flex justify-center items-center overflow-hidden">
                                <p class="text-sm">{{ $store->tier == 0 ? 'Gratis' : 'Langganan' }}</p>
                            </div>
                        </div>
                        <p>{{ Str::limit($store->description, 35) }}</p>
                    </div>
                </div>
            </div>
        </a>
        <hr>
    @endif

    <div class="w-full grid grid-cols-2 gap-2 pb-[4rem] mt-4">
        @if ($stores->isEmpty())
            <div class="absolute w-full top-[20rem] left-0 right-0 flex justify-center items-center">
                <span class="text-gray-500 text-base">Tidak ada toko yang tersedia</span>
            </div>
        @endif

        @foreach ($stores as $storeItem)
            <div wire:key="store-{{ $storeItem->id }}">
                <a href="{{ route('storeview', ['id' => $storeItem->id]) }}">
                    <div class="w-full h-full bg-white shadow rounded-md flex flex-col">
                        <div class="w-full bg-white rounded-tl-md rounded-tr-md">
                            <img src="{{ $storeItem->image ? Storage::url($storeItem->image) : Storage::url('assets/images/logotoko.png') }}"
                                alt="Profile Picture" loading="lazy"
                                class="object-cover w-full h-full rounded-tl-md rounded-tr-md aspect-square">
                        </div>
                        <div class="w-full p-2 flex flex-col">
                            <p class="font-bold text-xl">{{ $storeItem->name }}</p>
                            <p class="text-base">{{ Str::limit($storeItem->description, 30) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @if ($hasMorePages)
        <div 
            x-intersect="observe"
            class="flex justify-center mt-4 mb-4"
        >
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
        </div>
    @endif
</div>