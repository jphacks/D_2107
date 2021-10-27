<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SHOW') }}
        </h2>
    </x-slot>
    <div id="show-experience">
        <show-experience></show-experience>
    </div>

    <script src="{{ mix('js/show-experience.js') }}" defer></script>
</x-app-layout>