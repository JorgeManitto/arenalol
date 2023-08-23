<x-app-layout>
    <x-slot name="title">
      {{'Duo'.' '.$synergy->first_name.' - '.$synergy->second_name}} TierList
    </x-slot>
    <x-slot name="description">
        Descubre las mejores composiciones y sinergias para {{$synergy->first_name.' y '.$synergy->second_name}} del juego Arena en League of Legends. Domina las partidas con equipos conformados por dos jugadores en intensas batallas 2v2. Nuestra guía te proporcionará estrategias, estadísticas y habilidades de campeones, junto con la itemización clave para maximizar tu rendimiento en el campo de batalla. Conviértete en un experto en el meta de Arena y lleva tu juego al siguiente nivel con nuestras recomendaciones. ¡Prepárate para la victoria en este desafiante modo de League of Legends!
    </x-slot>
    <x-slot name="keywords">
       {{$synergy->first_name.','.$synergy->second_name}},ArenaLol, 2v2v2v2,Sinergias ArenaLol,Sinergias Arena,Sinergias League of Legends,Sinergias campeones LoL,Mejores sinergias LoL,Combos League of Legends,Estrategias sinergia Arena,Estrategias sinergia 2v2v2v2,Estrategias sinergia LoL,Sinergias equipo LoL,Sinergias equipo Arena,Sinergias equipo 2v2v2v2,Composiciones Arena,Composiciones League of Legends,Sinergias meta LoL,Guía de sinergias LoL,,Mejores sinergias 2v2v2v2,Counter de sinergias Arena,Counter de sinergias 2v2v2v2,Modo de juego Arena LoL,Arena 8 jugadores LoL,Composiciones Arena LoL,Sinergias para Arena LoL,Mejores combinaciones Arena LoL,Estrategias para modo Arena LoL,Equipos 2 jugadores Arena LoL,Composiciones meta Arena LoL,Argumentos campeones Arena LoL,Habilidades campeones Arena LoL,Estadísticas campeones Arena LoL,Itemización para Arena LoL,Mejores ítems Arena LoL,Guía Arena League of Legends,Tips y trucos Arena LoL,Campeones destacados para Arena LoL,Mejores duplas Arena LoL,Estrategias de equipo Arena LoL,Cómo ganar en el modo Arena LoL,Tier list Arena LoL
    </x-slot>
    <x-slot name="header">
        <div class="row">
            <h2 class="col-lg-10 font-semibold text-xl text-lol-gold leading-tight">
                {{ __('Duo'.' '.$synergy->first_name.' - '.$synergy->second_name) }} TierList
                </h2>
            <div class="col-lg-2" style="text-align: end;">Live {{$version}}</div>
        </div>
    </x-slot>

    <div class="py-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">

                <div class="row">     
                    <div class="col-lg-6">
                        <div class="row " style="height: 100px;justify-content: center;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$synergy->first_champ}}_0.jpg');background-position:top;background-size: cover;">
                               <div style="background-color: rgba(0, 0, 0, .6);">
                                    <div style="font-size:22px;font-weight: bold; text-align: center;" class="text-lol-gold"> <a href="{{ route('champion', ['name'=>$synergy->first_champ]) }}">{{$synergy->first_name}}</a></div>
                                    <div style="margin-bottom:1em;">
                                        <span>
                                            <a href="{{ route('champion', ['name'=>$synergy->first_champ]) }}">
                                                <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$synergy->first_champ}}.png" alt="" loading="lazy" class="m-0">
                                            </a>
                                        </span>
                                    </div>
                                    
                               </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row" style="height: 100px;justify-content: center;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$synergy->second_champ}}_0.jpg');background-position:top;background-size: cover;">
                            <div style="background-color: rgba(0, 0, 0, .6);">
                                <div style="font-size:22px;font-weight: bold; text-align: center;" class="text-lol-gold">
                                   <a href="{{ route('champion', ['name'=>$synergy->second_champ]) }}">{{$synergy->second_name}}</a></div>
                                <div style="margin-bottom:1em;">
                                    <span>
                                        <a href="{{ route('champion', ['name'=>$synergy->second_champ]) }}">
                                            <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$synergy->second_champ}}.png" alt="" loading="lazy" class="m-0">
                                        </a>
                                    </span>
                                </div>
                                
                           </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="bg-lol-dark text-white" style="display: flex;justify-content: space-between;border-bottom-left-radius: 1em;border-bottom-right-radius: 1em;"> --}}
                    {{-- <div class="text-lol-gold" style="padding:.5em;border-right: 1px solid #fff;">Win Rate: {{$synergy->win}}</div>
                    <div class="text-lol-gold" style="padding:.5em;border-right: 1px solid #fff;">Pick Rate: {{$synergy->pick}}</div>
                    <div class="text-lol-gold" style="padding:.5em;border-right: 1px solid #fff;">Tier: {{$synergy->tier}}</div> --}}
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
                    {{-- <div class="text-lol-gold" style="padding:.5em;">Dificulty: {{$dificulty}}</div> --}}
                {{-- </div> --}}
                <div class="mt-4 bg-lol-dark" style="padding: 0.5em;border-radius: .5em;gap: 1em;align-items: center;">
                    <div class="flex" style="justify-content: center">
                      <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;margin-right: 1.5em;">tier: {{$synergy->tier}}</div>
                      <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;margin-right: 1.5em;">win Rate: {{$synergy->win}}</div>
                      <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;margin-right: 1.5em;">pick Rate: {{$synergy->pick}}</div>
                      <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;">Dificulty: {{$dificulty}}</div>
                    </div>
                  </div>
                <div class="row" style="margin-top:1em;padding: .5em;">
                    <div class="col-lg-6">
                        <div class="bg-lol-dark" style="height: auto;border-radius:1em;">
                            <div style="position: relative;padding:1em 0;">
                                <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$synergy->first_champ}}.png" alt="" loading="lazy" class="m-0">
                            </div>
                            <div class="text-center text-white" style="font-size: 18px;font-weight: bold;">Best items</div>
                            <div style="display: flex;justify-content: center;">
                                @php
                                $first_items = json_decode($synergy->first_champ_build );
                                @endphp
                                
                                @if($first_items)
                                    @foreach ($first_items as $item)
                                    <div class="tooltip"  style="align-self: center;margin-left: .3em;">
                                        <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                        <span class="bg-lol-dark tooltip-text">
                                              <div class="flex" style="gap: 5px;">
                                                <img src="{{$item->image}}" alt="" width="40px">
                                                
                                                @php
                                                    $gold = json_decode($item->gold);
                                                @endphp
                                                <div>
                                                    <div class="text-lol-gold" style="text-align: left;">{{$item->name}}</div>
                                                    <div class="flex" style="gap:5px;">
                                                      <div>Buy: {{$gold->total}}</div>
                                                      <div>Sell: {{$gold->sell}}</div>
                                                    </div>
                                                </div>
                                              </div>
                                                
                                                <div style="text-align: left;">{!!$item->description!!}</div>
                                            </span>
                                      </div>
                                    @endforeach
                                @endif    
                            </div>
                            <div class="text-center text-white mt-4" style="font-size: 18px;font-weight: bold;">Situacional items</div>
                            <div style="display: flex;justify-content: center;padding-bottom: 1em;">
                                @php
                                $first_items = json_decode($synergy->first_champ_build_situacional );
                                @endphp
                                
                                @if($first_items)
                                    @foreach ($first_items as $item)
                                    <div class="tooltip"  style="align-self: center;margin-left: .3em;">
                                        <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                        <span class="bg-lol-dark tooltip-text">
                                              <div class="flex" style="gap: 5px;">
                                                <img src="{{$item->image}}" alt="" width="40px">
                                                
                                                @php
                                                    $gold = json_decode($item->gold);
                                                @endphp
                                                <div>
                                                    <div class="text-lol-gold" style="text-align: left;">{{$item->name}}</div>
                                                    <div class="flex" style="gap:5px;">
                                                      <div>Buy: {{$gold->total}}</div>
                                                      <div>Sell: {{$gold->sell}}</div>
                                                    </div>
                                                </div>
                                              </div>
                                                
                                                <div style="text-align: left;">{!!$item->description!!}</div>
                                            </span>
                                      </div>
                                    @endforeach
                                @endif    
                            </div>
                            @php
                            $argumentsSynergies = json_decode($synergy->first_champ_argument)? json_decode($synergy->first_champ_argument) : [];
                            // dd($argumentsSynergies);
                            @endphp
                            <div class="text-center text-white mt-4" style="font-size: 18px;font-weight: bold;">Best Arguments</div>
                            <div class="text-white row" style="padding:.5em;">
                                @foreach ($argumentsSynergies as $itemargument)
                                <div class="col-lg-4 col-12" style="margin-bottom: .5em;">
                                    <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: auto;background: #010A13;padding: 10px;border-color: #C89B3C;height: auto;overflow-y: auto;margin: auto;" >
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
                                <div class="text-center text-white " style="font-size: 18px;font-weight: bold;">Best items</div>
                                <div style="display: flex;justify-content: center;">
                                    @php
                                    $first_items = json_decode($synergy->second_champ_build );
                                    @endphp
                                    @if($first_items)
                                        @foreach ($first_items as $item)
                                        <div class="tooltip"  style="align-self: center;margin-left: .3em;">
                                            <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                            <span class="bg-lol-dark tooltip-text">
                                                  <div class="flex" style="gap: 5px;">
                                                    <img src="{{$item->image}}" alt="" width="40px">
                                                    
                                                    @php
                                                        $gold = json_decode($item->gold);
                                                    @endphp
                                                    <div>
                                                        <div class="text-lol-gold" style="text-align: left;">{{$item->name}}</div>
                                                        <div class="flex" style="gap:5px;">
                                                          <div>Buy: {{$gold->total}}</div>
                                                          <div>Sell: {{$gold->sell}}</div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                    
                                                    <div style="text-align: left;">{!!$item->description!!}</div>
                                                </span>
                                          </div>
                                        @endforeach
                                    @endif    
                                    </div>
                                    <div class="text-center text-white mt-4" style="font-size: 18px;font-weight: bold;">Situacional items</div>
                            <div style="display: flex;justify-content: center;padding-bottom: 1em;">
                                @php
                                $first_items = json_decode($synergy->second_champ_build_situacional );
                                @endphp
                                
                                @if($first_items)
                                    @foreach ($first_items as $item)
                                    <div class="tooltip"  style="align-self: center;margin-left: .3em;">
                                        <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                        <span class="bg-lol-dark tooltip-text">
                                              <div class="flex" style="gap: 5px;">
                                                <img src="{{$item->image}}" alt="" width="40px">
                                                
                                                @php
                                                    $gold = json_decode($item->gold);
                                                @endphp
                                                <div>
                                                    <div class="text-lol-gold" style="text-align: left;">{{$item->name}}</div>
                                                    <div class="flex" style="gap:5px;">
                                                      <div>Buy: {{$gold->total}}</div>
                                                      <div>Sell: {{$gold->sell}}</div>
                                                    </div>
                                                </div>
                                              </div>
                                                
                                                <div style="text-align: left;">{!!$item->description!!}</div>
                                            </span>
                                      </div>
                                    @endforeach
                                @endif    
                            </div>
                                @php
                                $argumentsSynergies = json_decode($synergy->second_champ_argument)? json_decode($synergy->second_champ_argument) : [];
                                // dd($argumentsSynergies);
                                @endphp
                                <div class="text-center text-white mt-4" style="font-size: 18px;font-weight: bold;">Best Arguments</div>
                                <div class="text-white row" style="padding:.5em;">
                                    @foreach ($argumentsSynergies as $itemargument)
                                    <div class="col-lg-4 col-12" style="margin-bottom: .5em;">
                                        <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: auto;background: #010A13;padding: 10px;border-color: #C89B3C;height: auto;overflow-y: auto;margin: auto;" >
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
