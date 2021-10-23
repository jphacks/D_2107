<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('add') }}
        </h2>
    </x-slot>
    <div id="add-experience">
        <add-experience></add-experience>
    </div>

    <script src="{{ mix('js/add-experience.js') }}" defer></script>
</x-app-layout>