<div class="w-full p-4 flex flex-col">
    <div class="w-full flex justify-center items-center">
        <div class="w-[8rem] h-[8rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
            <img src="{{ $image ? $image->temporaryUrl() : Storage::url('assets/images/logotoko.png') }}"
                alt="Profile Picture" class="object-cover w-full h-full">
        </div>
        <div class="absolute translate-y-10 translate-x-10">
            <label for="image"
                class="cursor-pointer w-auto h-auto p-2 bg-gray-100 rounded-full flex justify-center items-center shadow-lg">
                <i class="ph ph-folder-open text-4xl"></i>
            </label>
            <input type="file" wire:model="image" id="image" class="hidden">
        </div>
    </div>
    @error('image')
        <div class="w-full flex justify-center items-center">
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        </div>
    @enderror
    <hr class="mt-8">
    <form wire:submit.prevent="addproduct({{ $id }})" class="mt-4">
        <div class="flex flex-col">
            <label for="email" class="text-base ">Nama Produk</label>
            <input type="text" wire:model="name"
                class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                id="email" placeholder="Masukan nama produk anda">
            @error('name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col mt-4">
            <label for="email" class="text-base ">Deskripsi Produk</label>
            <input type="text" wire:model="description"
                class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                id="email" placeholder="Masukan deskripsi produk anda">
            @error('description')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col mt-4">
            <label for="price">Harga Produk</label>
            <input type="text" id="price" wire:model="price" wire:keyup="formatPrice"
                class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                placeholder="Masukkan harga produk">
            @error('price')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col mt-4">
            <label for="price">Stock Produk</label>
            <input type="number" id="price" wire:model="stock"
                class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                placeholder="Masukkan stock produk">
            @error('stock')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-4 flex justify-start items-center">
            <input type="checkbox" wire:model="iscod" id="iscod"
                class="w-6 h-6 text-sky-500 bg-gray-100 rounded-md">
            <label for="iscod" class="ml-2 text-sm">bisa COD</label>
        </div>
        <div class="mt-8">
            <button type="submit" wire:loading.attr="disabled" wire:target="addproduct({{ $id }})" class="w-full py-4 bg-sky-500 hover:bg-sky-600 text-white font-bold rounded-md flex justify-center items-center">
                <span wire:loading wire:target="addproduct({{ $id }})">
                    <i class="ph ph-circle-notch animate-spin text-xl"></i>
                </span>
                <span wire:loading.remove wire:target="addproduct({{ $id }})">
                    Tambah
                </span>
            </button>
        </div>
    </form>
</div>
