<x-app-layout>
  <x-slot name="title">
    {{$champion->name}} - ArenaLol
  </x-slot>
  <x-slot name="description">
      Descubre las mejores composiciones y sinergias para {{$champion->name}} del juego Arena en League of Legends. Domina las partidas con equipos conformados por dos jugadores en intensas batallas 2v2. Nuestra guía te proporcionará estrategias, estadísticas y habilidades de campeones, junto con la itemización clave para maximizar tu rendimiento en el campo de batalla. Conviértete en un experto en el meta de Arena y lleva tu juego al siguiente nivel con nuestras recomendaciones. ¡Prepárate para la victoria en este desafiante modo de League of Legends!
  </x-slot>
  <x-slot name="keywords">
     {{$champion->name}},ArenaLol, 2v2v2v2,Sinergias ArenaLol,Sinergias Arena,Sinergias League of Legends,Sinergias campeones LoL,Mejores sinergias LoL,Combos League of Legends,Estrategias sinergia Arena,Estrategias sinergia 2v2v2v2,Estrategias sinergia LoL,Sinergias equipo LoL,Sinergias equipo Arena,Sinergias equipo 2v2v2v2,Composiciones Arena,Composiciones League of Legends,Sinergias meta LoL,Guía de sinergias LoL,,Mejores sinergias 2v2v2v2,Counter de sinergias Arena,Counter de sinergias 2v2v2v2,Modo de juego Arena LoL,Arena 8 jugadores LoL,Composiciones Arena LoL,Sinergias para Arena LoL,Mejores combinaciones Arena LoL,Estrategias para modo Arena LoL,Equipos 2 jugadores Arena LoL,Composiciones meta Arena LoL,Argumentos campeones Arena LoL,Habilidades campeones Arena LoL,Estadísticas campeones Arena LoL,Itemización para Arena LoL,Mejores ítems Arena LoL,Guía Arena League of Legends,Tips y trucos Arena LoL,Campeones destacados para Arena LoL,Mejores duplas Arena LoL,Estrategias de equipo Arena LoL,Cómo ganar en el modo Arena LoL,Tier list Arena LoL
  </x-slot>
  <x-slot name="header">
      <div class="row">
          <h2 class="col-lg-10 font-semibold text-xl text-lol-gold leading-tight">
              {{ __($champion->name) }}
              </h2>
          <div class="col-lg-2" style="text-align: end;">Live {{$version}}</div>
      </div>
  </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="row h-lg-160 h-200" style="padding:0 1em;justify-content: space-between;align-items: center;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$champion->slug_name}}_0.jpg');background-position:top;background-size: cover;width: 100%;margin: auto;align-content: center;">
            <div class="col-lg-4">
              <div class="flex " style="padding: 0.5em;border-radius: 1em;background: rgba(0,0,0,0.6);gap: 1em;align-items: center;">
                @php
                  $imagen = json_decode($champion->image);
                  $tags = json_decode($champion->tags);
                  $imgTier = $champion->tier == 'S+'  ? 'S-plus' :$champion->tier;
                @endphp
                <img width="48px" height="48px" style="object-fit: cover;" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$imagen->full}}" alt="" loading="lazy" class="m-0">
                <div class="text-white">
                  <div class="text-lol-gold" style="font-size: 22px;font-weight: bold;">{{$champion->name}}</div>
                  <div class="text-lol-gold" style="font-size: 11px;text-transform: capitalize;">{{$champion->title}}</div>
                </div>
                <div style="margin-left: auto;">
                  
                  <img src="{{asset("assets/images/$imgTier.png")}}" style="width:64px;" alt="">
                </div>
              </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
              <div class="flex" style="justify-content: flex-end;">
                @foreach ($tags as $tag)
                <div class="mb-4 flex text-xs font-medium mr-2 bg-lol-dark text-white rounded" style="margin: 0.5em;padding: 0 .5em;gap:.3em;align-items: center;">
                  <img src="{{asset("icons/$tag.webp")}}" alt="{{$tag}}">
                  <div class="text-lol-gold">{{$tag}}</div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="col-lg-4" style="margin-top: .5em;">
              <div class="flex " style="padding: 0.5em;border-radius: .5em;background: rgba(0,0,0,0.6);gap: 1em;align-items: center;">
                <div class="flex">
                  <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;margin-right: 1.5em;">tier: {{$champion->tier}}</div>
                  <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;margin-right: 1.5em;">win Rate: {{$champion->win}}</div>
                  <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;margin-right: 1.5em;">pick Rate: {{$champion->pick}}</div>
                  <div class="text-lol-gold" style="text-transform: capitalize;font-size: 11px;font-weight: bold;">ban Rate: {{$champion->ban}}</div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row" style="margin: 1em auto;">
            <div class="col-lg-4 mt-4" style="gap: 1em;align-items: center;">
              <div style="padding:1em 0.5em;border-radius: .5em;background: rgba(0,0,0,0.6);">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="text-white text-center" style="font-size: 22px;font-weight: bold;">
                      Stats
                  </div>
                    @php
                        $stats = json_decode($champion->stats);
                    @endphp
    
                    <div style="border-radius: .5em; border:1px solid #fff;margin: auto;">
                      <div class="text-lol-gold fs-11 fw-bold flex" style="justify-content: space-between;border-bottom: 1px solid #fff; padding: .5em;"> <div>Hp:</div> <span class="text-end">{{$stats->hp}}</span></div>
                      <div class="text-lol-gold fs-11 fw-bold flex" style="justify-content: space-between;border-bottom: 1px solid #fff; padding: .5em;"> <div>Move Speed:</div> <span class="text-end">{{$stats->movespeed}}</span></div>
                      <div class="text-lol-gold fs-11 fw-bold flex" style="justify-content: space-between;border-bottom: 1px solid #fff; padding: .5em;"> <div>Armor:</div> <span class="text-end">{{$stats->armor}}</span></div>
                      <div class="text-lol-gold fs-11 fw-bold flex" style="justify-content: space-between;border-bottom: 1px solid #fff; padding: .5em;"> <div>Attack Range:</div> <span class="text-end">{{$stats->attackrange}}</span></div>
                      <div class="text-lol-gold fs-11 fw-bold flex" style="justify-content: space-between;border-bottom: 1px solid #fff; padding: .5em;"> <div>Attack Damage:</div> <span class="text-end">{{$stats->attackdamage}}</span></div>
                      <div class="text-lol-gold fs-11 fw-bold flex" style="justify-content: space-between; padding: .5em;"> <div>Attack Speed:</div> <span class="text-end">{{$stats->attackspeed}}</span></div>
                    </div>
                  
                  </div>
    
                  <div class="col-lg-6">
                    <div style="height: 200px;width: auto;margin: auto;">
                      <canvas style="margin: auto;" id="radarChart"></canvas>
                    </div> 
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-4 mt-4">
              <div style="padding:1em 0.5em;border-radius: .5em;background: rgba(0,0,0,0.6);">
                  @php
                  $first_items = json_decode($champion->build);
                  $itemsSituacional = json_decode($champion->itemsSituacional );
                  @endphp
                   <div class="text-center text-white" style="font-size: 18px;font-weight: bold;">Best early item</div>
                   <div class="mb-4" style="display: flex;justify-content: center;    padding-bottom: 1em;  border-bottom: 1px solid #0A1428;">
                     
                     @if($first_items)
                             <div class="tooltip"  style="align-self: center;margin-right: .3em;">
                                 <img width="24px" src="{{$first_items[0]->image}}" alt="{{$first_items[0]->name}}" loading="lazy" class="m-0">
                                  <span class="bg-lol-dark tooltip-text">
                                        <div class="flex" style="gap:5px;">
                                          <img src="{{$first_items[0]->image}}" alt="" width="40px">
                                         
                                          @php
                                              $gold = json_decode($first_items[0]->gold);
                                          @endphp
                                          <div>
                                              <div class="text-lol-gold" style="text-align: left;">{{$first_items[0]->name}}</div>
                                              <div class="flex" style="gap:5px;">
                                                <div>Buy: {{$gold->total}}</div>
                                                <div>Sell: {{$gold->sell}}</div>
                                              </div>
                                          </div>
                                        </div>
                                         
                                         <div style="text-align: left;">{!!$first_items[0]->description!!}</div>
                                     </span>
                             </div>
                     @endif    
                    </div>
                   <div class="text-center text-white" style="font-size: 18px;font-weight: bold;">Best boot</div>
                   <div class="mb-4" style="display: flex;justify-content: center;  padding-bottom: 1em;  border-bottom: 1px solid #0A1428;">
                     
                     @if($first_items && $champion->slug_name != 'Cassiopeia')
                      <div class="tooltip"  style="align-self: center;margin-right: .3em;">
                        <img width="24px" src="{{$first_items[1]->image}}" alt="{{$first_items[1]->name}}" loading="lazy" class="m-0">
                        <span class="bg-lol-dark tooltip-text">
                              <div class="flex" style="gap: 5px;">
                                <img src="{{$first_items[1]->image}}" alt="" width="40px">
                                
                                @php
                                    $gold = json_decode($first_items[1]->gold);
                                @endphp
                                <div>
                                    <div class="text-lol-gold" style="text-align: left;">{{$first_items[1]->name}}</div>
                                    <div class="flex" style="gap:5px;">
                                      <div>Buy: {{$gold->total}}</div>
                                      <div>Sell: {{$gold->sell}}</div>
                                    </div>
                                </div>
                              </div>
                                
                                <div style="text-align: left;">{!!$first_items[1]->description!!}</div>
                            </span>
                      </div>
                     @endif    
                    </div>

                <div class="text-center text-white" style="font-size: 18px;font-weight: bold;">Best final build</div>
                <div style="display: flex;justify-content: center;padding-bottom: 1em;  border-bottom: 1px solid #0A1428;">
                  
                  @if($first_items)
                      @foreach ($first_items as $key => $item)
                        @if($key)
                        <div class="tooltip"  style="align-self: center;margin-right: .3em;">
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
                        @endif  
                      @endforeach
                  @endif    
                </div>
                <div class="text-center text-white" style="font-size: 18px;font-weight: bold;">Situacional items</div>
                <div style="display: flex;justify-content: center;">
                  
                  @if($itemsSituacional)
                      @foreach ($itemsSituacional as $key => $item)
                        @if($item)
                        <div class="tooltip"  style="align-self: center;margin-right: .3em;">
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
                        @endif  
                      @endforeach
                  @endif    
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-4">
              <div style="padding:1em 0.5em;border-radius: .5em;background: rgba(0,0,0,0.6);">
                @php
                $arguments = json_decode($champion->argument)? json_decode($champion->argument) : [];
                // dd($argumentsSynergies);
                
                @endphp
                <div class="text-white row" style="padding:.5em;">
                    @foreach ($arguments as $itemargument)
                    <div class="col-lg-6 col-12" style="margin-bottom: .5em;">
                        <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: auto;background: #010A13;padding: 10px;border-color: #C89B3C;height: auto;overflow-y: auto;margin: auto;" >
                            <img style="width: 48px;margin: auto;" src="{{$champion->argument($itemargument)->src}}" alt="{{$champion->argument($itemargument)->name}}">
                            <h5 class="mb-2 font-bold tracking-tight text-white mt-5" style="font-size: 14px;text-align: center;">{{$champion->argument($itemargument)->name}}</h5>
                            <div style="padding: 0 .5em;width: 5em;text-transform: capitalize;margin: 1em auto;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full text-center">{{$champion->argument($itemargument)->type}}</div>
                            <p class="text-gray-400" style="font-size: 14px;text-align: center">{{$champion->argument($itemargument)->description}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
              </div>
            </div>

            <div class="col-12 mt-4">
              <div style="padding:1em 0.5em;border-radius: .5em;background: rgba(0,0,0,0.6);">
                <div class="text-lol-gold" style="font-weight: bold;font-size: 26px;">Best duos</div>
                <div class="flex mt-4" style="justify-content: space-evenly;">
                  @php
                    $best_duo = json_decode($champion->best_duo)? json_decode($champion->best_duo) : [];
                  @endphp
                  @foreach ($best_duo as $duo)
                      <a href="{{ route('champion', ['name'=>$champion->duo($duo)->slug_name]) }}">
                          <img width="100px" height="100px" style="object-fit: cover;border-radius: 100%;border:3px solid #C89B3C;" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$champion->duo($duo)->slug_name}}.png" />
                          <div class="text-lol-gold text-center d-none d-lg-block">{{$champion->duo($duo)->name}}</div>
                      </a>
                  @endforeach
                </div>
              </div>
            </div>

          </div>
          
        </div>

    <script>    
      // Obtén el contexto del lienzo (canvas)
      var ctx = document.getElementById('radarChart').getContext('2d');

      // Configuración del Radar Chart
      var radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
          labels: [@foreach($info_index as $info) '{{$info}}', @endforeach], // Etiquetas del eje radial
          datasets: [{
            label: 'Info', // Leyenda del conjunto de datos
            data: [{{implode(",",$info_value)}}], // Valores para cada etiqueta
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo
            borderColor: 'rgba(75, 192, 192, 1)', // Color del borde
            borderWidth: 3 // Ancho del borde
          }]
        },
        options: {
          scales: {
            r: {
              max: 10,
              min: 0,
              ticks: {
                stepSize: 5,
                backdropColor: "orange",
                color: "white"
              },
              grid: {
                color: "white"
              },
              angleLines: {
                  color: "white"
              },
              pointLabels: {
                font: {
                  size: 11
                }
              }
            }
          }
        }
      });

    </script>
</x-app-layout>