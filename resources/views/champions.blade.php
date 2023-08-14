<x-app-layout>
    <x-slot name="title">
        Champions - ArenaLol
       </x-slot>
    <x-slot name="header">
        <div class="row">
            <h2 class="col-lg-10 font-semibold text-xl text-lol-gold leading-tight">
                {{ __('Champions') }}
                </h2>
            <div class="col-lg-2" style="text-align: end;">Live {{$version}}</div>
        </div>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}
                    @livewire('front.champions')
            {{-- </div> --}}
        </div>
    </div>
    
</x-app-layout>