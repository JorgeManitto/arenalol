<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <h2 class="col-lg-10 font-semibold text-xl text-lol-gold leading-tight">
                {{ __('Synergy') }}
                </h2>
            <div class="col-lg-2">Live 13.14</div>
        </div>
    </x-slot>

    <div class="py-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">

                <div class="row">     
                    <div class="col-lg-6">
                        <div class="row  h-lg-160 h-200" style="justify-content: center;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$synergy->first_champ}}_0.jpg');background-position:top;background-size: cover;">
                               <div style="background-color: rgba(0, 0, 0, .6);">
                                    <div style="font-size:22px;font-weight: bold; text-align: center;" class="text-lol-gold">{{$synergy->first_name}}</div>
                                    <div style="margin-bottom:1em;">
                                        <span>
                                            <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$synergy->first_champ}}.png" alt="" loading="lazy" class="m-0">
                                        </span>
                                    </div>
                                    <div style="display: flex;justify-content: center;">
                                    @php
                                    $first_items = json_decode($synergy->first_champ_build );
                                    @endphp
                                    @if($first_items)
                                        @foreach ($first_items as $item)
                                            <div  style="align-self: center;margin-right: .3em;">
                                                <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                            </div>
                                        @endforeach
                                    @endif    
                                    </div>
                               </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row h-lg-160 h-200" style="justify-content: center;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$synergy->second_champ}}_0.jpg');background-position:top;background-size: cover;">
                            <div style="background-color: rgba(0, 0, 0, .6);">
                                <div style="font-size:22px;font-weight: bold; text-align: center;" class="text-lol-gold">{{$synergy->second_name}}</div>
                                <div style="margin-bottom:1em;">
                                    <span>
                                        <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$synergy->second_champ}}.png" alt="" loading="lazy" class="m-0">
                                    </span>
                                </div>
                                <div style="display: flex;justify-content: center;">
                                @php
                                $first_items = json_decode($synergy->second_champ_build );
                                @endphp
                                @if($first_items)
                                    @foreach ($first_items as $item)
                                        <div  style="align-self: center;margin-right: .3em;">
                                            <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                        </div>
                                    @endforeach
                                @endif    
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="bg-lol-dark text-white" style="display: flex;justify-content: space-between;border-bottom-left-radius: 1em;border-bottom-right-radius: 1em;">
                    <div class="text-lol-gold" style="padding:.5em;border-right: 1px solid #fff;">Win Rate: {{$synergy->win}}</div>
                    <div class="text-lol-gold" style="padding:.5em;border-right: 1px solid #fff;">Pick Rate: {{$synergy->pick}}</div>
                    <div class="text-lol-gold" style="padding:.5em;border-right: 1px solid #fff;">Tier: {{$synergy->tier}}</div>
                    @php
                                        $dificulty = '';
                                        $color = '';
                                           switch ($synergy->dificulty) {
                                            case '0':
                                                $dificulty = "Easy";
                                                $color = "success";
                                                break;
                                            
                                            case '1':
                                                $dificulty = "Medium";
                                                $color = "primary";
                                                break;
                                            
                                            case '2':
                                                $dificulty = "Hard";
                                                $color = "danger";
                                                break;
                                            
                                            default:
                                                $dificulty = "Easy";
                                                $color = "green";
                                                break;
                                           }
                                       @endphp
                    <div class="text-lol-gold" style="padding:.5em;">Dificulty: {{$dificulty}}</div>
                </div>
                <div class="row" style="margin-top:1em;padding: .5em;">
                    <div class="col-lg-6">
                        <div class="bg-lol-dark" style="height: auto;border-radius:1em;">
                            <div style="position: relative;padding:1em 0;">
                                <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$synergy->first_champ}}.png" alt="" loading="lazy" class="m-0">
                            </div>
                            @php
                            $argumentsSynergies = json_decode($synergy->first_champ_argument)? json_decode($synergy->first_champ_argument) : [];
                            // dd($argumentsSynergies);
                            
                            @endphp
                            <div class="text-white row" style="padding:.5em;">
                                @foreach ($argumentsSynergies as $itemargument)
                                <div class="col-lg-4 col-12" style="margin-bottom: .5em;">
                                    <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: auto;background: #010A13;padding: 10px;border-color: #C89B3C;height: 250px;overflow-y: auto;margin: auto;" >
                                        <img style="width: 50px;margin: auto;" src="{{$synergy->argument($itemargument)->src}}" alt="{{$synergy->argument($itemargument)->name}}">
                                        <h5 class="mb-2 font-bold tracking-tight text-white mt-5" style="font-size: 14px;text-align: center;">{{$synergy->argument($itemargument)->name}}</h5>
                                        <div style="padding: 0 .5em;width: 5em;text-transform: capitalize;margin: 1em auto;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full text-center">{{$synergy->argument($itemargument)->type}}</div>
                                        <p class="text-gray-400" style="font-size: 14px;text-align: center">{{$synergy->argument($itemargument)->description}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div class="bg-lol-dark" style="height: auto;border-radius:1em;">
                                <div style="position: relative;padding:1em 0;">
                                    <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$synergy->second_champ}}.png" alt="" loading="lazy" class="m-0">
                                </div>
                                @php
                                
                                $argumentsSynergies = json_decode($synergy->second_champ_argument)? json_decode($synergy->second_champ_argument) : [];
                                // dd($argumentsSynergies);
                                
                                @endphp
                                <div class="text-white row" style="padding:.5em;">
                                    @foreach ($argumentsSynergies as $itemargument)
                                    <div class="col-lg-4 col-12" style="margin-bottom: .5em;">
                                        <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: auto;background: #010A13;padding: 10px;border-color: #C89B3C;height: 250px;overflow-y: auto;margin: auto;" >
                                            <img style="width: 50px;margin: auto;" src="{{$synergy->argument($itemargument)->src}}" alt="{{$synergy->argument($itemargument)->name}}">
                                            <h5 class="mb-2 font-bold tracking-tight text-white mt-5" style="font-size: 14px;text-align: center;">{{$synergy->argument($itemargument)->name}}</h5>
                                            <div style="padding: 0 .5em;width: 5em;text-transform: capitalize;margin: 1em auto;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full text-center">{{$synergy->argument($itemargument)->type}}</div>
                                            <p class="text-gray-400" style="font-size: 14px;text-align: center">{{$synergy->argument($itemargument)->description}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
