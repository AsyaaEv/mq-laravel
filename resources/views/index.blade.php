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
    <livewire:layout />
    @livewireScripts
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('update-url', ({tabValue}) => {
                const url = new URL(window.location.href);
                url.searchParams.set('tab', tabValue);
                history.pushState({}, '', url.toString());
            });
        });
    </script>
</body>

</html>