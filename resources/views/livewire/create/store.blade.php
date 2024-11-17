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
    <form wire:submit.prevent="CreateStore" class="mt-4">
        <div class="flex flex-col">
            <label for="email" class="text-base ">Nama Toko</label>
            <input type="text" wire:model="storename"
                class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                id="email" placeholder="Masukan nama toko anda">
            @error('storename')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col mt-4">
            <label for="email" class="text-base ">Deskripsi Toko</label>
            <input type="text" wire:model="storedescription"
                class="w-full mt-2 p-4 border rounded-md outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                id="email" placeholder="Masukan deskripsi toko anda">
            @error('storedescription')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-8">
            <button type="submit" wire:loading.attr="disabled" wire:target="CreateStore" class="w-full py-4 bg-sky-500 hover:bg-sky-600 text-white font-bold rounded-md flex justify-center items-center disabled:opacity-75 disabled:cursor-not-allowed">
                <span wire:loading wire:target="CreateStore">
                    <i class="ph ph-circle-notch animate-spin text-xl"></i>
                </span>
                <span wire:loading.remove wire:target="CreateStore">
                    Buat
                </span>
            </button>
        </div>
    </form>
</div>
