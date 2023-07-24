<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="col-lg-10 font-semibold text-xl text-lol-gold leading-tight">
                {{ __('Best Sinergies') }}
                </h2>
            <div class="col-lg-2">Live 13.14</div>
        </div>
    </x-slot>

    <div class="py-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                {{-- <x-welcome /> --}}
                <x-portada :sinergies=$sinergies :tiers=$tiers />
            </div>
        </div>
    </div>
</x-app-layout>
