<x-filament-panels::page>
    @livewireScripts
    @livewireStyles
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:pages.google-maps.google-maps-page />
</x-filament-panels::page>
