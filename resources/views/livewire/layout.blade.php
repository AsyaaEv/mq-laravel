<div class="w-full p-4">
    <main>
        @switch($activeTab)
            @case('home')
                <livewire:home />
            @break
            @case('search')
                <livewire:search />
            @break
            @case('store')
                <livewire:store />
            @break
            @case('profile')
                <livewire:profile />
            @break
        @endswitch
    </main>

    <nav class="fixed bottom-0 right-0 left-0 h-[4rem] border-t bg-white">
        <div class="flex justify-between items-center px-8 h-full">
            <button wire:click="setActiveTab('home')" class="flex flex-col items-center justify-center">
                <i class="text-2xl {{ $activeTab == 'home' ? 'ph ph-house-fill text-amber-500' : 'ph ph-house' }}"></i>
                <p class="text-sm {{ $activeTab == 'home' ? 'text-amber-500' : '' }}">Untukmu</p>
            </button>
            <button wire:click="setActiveTab('search')" class="flex flex-col items-center justify-center">
                <i
                    class="text-2xl {{ $activeTab == 'search' ? 'ph ph-magnifying-glass-fill text-amber-500' : 'ph ph-magnifying-glass' }}"></i>
                <p class="text-sm {{ $activeTab == 'search' ? 'text-amber-500' : '' }}">Cari</p>
            </button>
            <button wire:click="setActiveTab('store')" class="flex flex-col items-center justify-center">
                <i class="text-2xl {{ $activeTab == 'store' ? 'ph ph-storefront-fill text-amber-500' : 'ph ph-storefront' }}"></i>
                <p class="text-sm {{ $activeTab == 'store' ? 'text-amber-500' : '' }}">Toko</p>
            </button>
            <button wire:click="setActiveTab('profile')" class="flex flex-col items-center justify-center">
                <i
                    class="text-2xl {{ $activeTab == 'profile' ? 'ph ph-user-fill text-amber-500' : 'ph ph-user' }}"></i>
                <p class="text-sm {{ $activeTab == 'profile' ? 'text-amber-500' : '' }}">Profil</p>
            </button>
        </div>
    </nav>
</div>
