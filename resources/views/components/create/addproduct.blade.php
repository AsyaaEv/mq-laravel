<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MarketQue</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div class="w-full h-[4rem] border-b flex px-4 justify-start items-center gap-2">
        <a href="{{ url()->previous() }}"" class="flex justify-center items-center gap-2">
            <i class="ph ph-arrow-left text-3xl"></i>
            <h1 class="font-bold text-xl">Tambah Product</h1>
        </a>
    </div>
    <livewire:create.addproduct :id="$id" />
    @livewireScripts
</body>

</html>