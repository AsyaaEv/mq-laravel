<div class="w-full p-4 flex flex-col">
    <div class="w-full flex justify-center items-center">
        <div class="w-[8rem] h-[8rem] bg-gray-100 rounded-full flex justify-center items-center overflow-hidden">
            <img src="{{ $imageNew ? $imageNew->temporaryUrl() : Storage::url($image) }}" alt="Profile Picture"
                class="object-cover w-full h-full">
        </div>
        <div class="absolute translate-y-10 translate-x-10">
            <label for="image"
                class="cursor-pointer w-auto h-auto p-2 bg-gray-100 rounded-full flex justify-center items-center shadow-lg">
                <i class="ph ph-folder-open text-4xl"></i>
            </label>
            <input type="file" wire:model="imageNew" id="image" class="hidden">
        </div>
    </div>
    @error('image')
        <div class="w-full flex justify-center items-center">
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        </div>
    @enderror
    <hr class="mt-8">
    <form wire:submit.prevent="updateProduct" class="mt-4">
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
            <button
                type="submit"class="w-full py-4 bg-sky-500 hover:bg-sky-600 text-white font-bold rounded-md">Perbarui</button>
        </div>
        <div class="mt-4">
            <button type="button" wire:click="confirmDelete({{ $this->id }})"
                class="w-full border rounded-md border-red-500 p-4 font-bold text-red-500 flex gap-2 justify-center items-center">
                <i class="ph ph-trash text-2xl"></i>
                <p>Hapus Produk</p>
            </button>
        </div>
    </form>

    @if ($showDeleteModal == true)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="deleteModal">
            <div class="relative top-[15rem] border w-[90%] mx-auto border-gray-200 shadow-lg rounded-md bg-white">
                <div class="flex justify-center items-center flex-col">
                    <div class="p-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Hapus Produk</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Apakah Anda yakin ingin menghapus produk ini?
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-2 p-4">
                        <button wire:click="$set('showDeleteModal', false)"
                        class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 ml-3">
                        Batal
                    </button>
                    <button wire:click="deleteProduct"
                        class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Hapus
                    </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
