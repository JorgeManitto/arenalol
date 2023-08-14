<x-app-layout>
    <x-slot name="title">
       Arguments - ArenaLol
      </x-slot>
    <x-slot name="header">
        <div class="row">
            <h2 class="col-lg-10 font-semibold text-xl text-lol-gold leading-tight">
                {{ __('Arguments') }}
                </h2>
            <div class="col-lg-2">Live {{$version}}</div>
        </div>
    </x-slot>

    <div class="py-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="row" style="margin: 10px;">
                    <h2 class="fw-bold text-lol-gold mt-3" style="font-size: 26px;text-align: center;">Silver</h2>
                    @foreach ($argumentsSilver as $argument)
                        <div class="col-lg-2 col-12 mt-3">
                            <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 190px;background: #010A13;padding: 10px;border-color: #C89B3C;height: auto;overflow-y: auto;margin: auto;" >
                                <img style="width: 100px;margin: auto;" src="{{$argument->src}}" alt="{{$argument->name}}">
                                <h5 class="mb-2 font-bold tracking-tight text-white mt-5" style="font-size: 14px;text-align: center;">{{$argument->name}}</h5>
                                <div style="padding: 0 .5em;width: 5em;text-transform: capitalize;margin: 1em auto;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full text-center">{{$argument->type}}</div>
                                <p class="text-gray-400" style="font-size: 14px;text-align: center">{{$argument->description}}</p>
                            </div>
                        </div>
                    @endforeach
                    <h2 class="fw-bold text-lol-gold mt-3" style="font-size: 26px;text-align: center;">Gold</h2>
                    @foreach ($argumentsGold as $argument)
                        <div class="col-lg-2 col-12 mt-3">
                            <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 190px;background: #010A13;padding: 10px;border-color: #C89B3C;height: auto;overflow-y: auto;margin: auto;" >
                                <img style="width: 100px;margin: auto;" src="{{$argument->src}}" alt="{{$argument->name}}">
                                <h5 class="mb-2 font-bold tracking-tight text-white mt-5" style="font-size: 14px;text-align: center;">{{$argument->name}}</h5>
                                <div style="padding: 0 .5em;width: 5em;text-transform: capitalize;margin: 1em auto;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full text-center">{{$argument->type}}</div>
                                <p class="text-gray-400" style="font-size: 14px;text-align: center;">{{$argument->description}}</p>
                            </div>
                        </div>
                    @endforeach
                    <h2 class="fw-bold text-lol-gold mt-3" style="font-size: 26px;text-align: center;">Prismatic</h2>
                    @foreach ($argumentsPrismatic as $argument)
                        <div class="col-lg-2 col-12 mt-3">
                            <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 190px;background: #010A13;padding: 10px;border-color: #C89B3C;height: auto;overflow-y: auto;margin: auto;" >
                                <img style="width: 100px;margin: auto;" src="{{$argument->src}}" alt="{{$argument->name}}">
                                <h5 class="mb-2 font-bold tracking-tight text-white mt-5" style="font-size: 14px;text-align: center;">{{$argument->name}}</h5>
                                <div style="padding: 0 .5em;width: 5em;text-transform: capitalize;margin: 1em auto;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full text-center">{{$argument->type}}</div>
                                <p class="text-gray-400" style="font-size: 14px;text-align: center;overflow-y: auto;">{{$argument->description}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
