<x-app-layout>
    <x-slot name="title">
        Duo TierList - ArenaLol
      </x-slot>
      
    <x-slot name="header">
        <div class="row">
            <h2 class="col-lg-10 font-semibold text-xl text-lol-gold leading-tight">
                {{ __('Best Duo TierList') }}
                </h2>
            <div class="col-lg-2" style="text-align: end">Live {{$version}}</div>
        </div>
    </x-slot>

    <div class="py-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                {{-- <x-welcome /> --}}
                <x-portada :tiers=$tiers :version=$version />
            </div>
        </div>
    </div>
</x-app-layout>
