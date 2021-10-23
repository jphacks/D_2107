<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div id="test">
        <test-component></test-component>
    </div>

    <script src="{{ mix('js/test.js') }}" defer></script>
</x-app-layout>