<div class="row">
    <div class="row col-lg-9 col-12" id="accordion-collapse" data-accordion="collapse" style="margin: 0em auto;">

@foreach ($sinergies as $sinergy)
        <div style="cursor: pointer;" class="col-12 shadow-xl sm:rounded-lg mt-3" data-accordion-target="#accordion-collapse-body-{{$sinergy->id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$sinergy->id}}">
           
            <div class="row">     
                <div class="col-lg-6">
                    <div class="row" style="background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$sinergy->first_champ}}_0.jpg');background-position:top;background-size: cover;">
                        <div class="col-lg-4" style="padding: 2.5em;">
                            <div class="row">
                                <div class="col">
                                    <div class="text-white fs-22 fw-bold" >
                                        <div class="fs-16">{{$sinergy->name}}</div>
                                    </div>
                                    <div>
                                        <span class="bg-gray-100 text-xs font-medium mr-2 bg-lol-gold text-white rounded " style="padding: 0 .5em;">13.13</span>
                                       @php
                                        $dificulty = '';
                                        $color = '';
                                           switch ($sinergy->dificulty) {
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
                                        <span style="padding: 0 .5em;" class="bg-{{$color}} text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full ">{{$dificulty}}</span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="col-lg-8" style="padding: 2.5em;">
                            <div >
                                <div >
                                    <div style="display: flex;justify-content: flex-end;">
                                      @php
                                      $first_items = json_decode($sinergy->first_item );
                                      @endphp
                                      @foreach ($first_items as $item)
                                        {{--  data-popover id="item-{{$item->id}}" role="tooltip" --}}
                                      {{-- <div style="width: 300px;" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">{{$item->name}}</h3>
                                        </div>
                                        <div data-popper-arrow></div>
                                        </div> --}}
                                        {{-- data-popover-target="item-{{$item->id}}" --}}

                                        <div  style="align-self: flex-end;margin-right: .3em;">
                                            <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                        </div>
                                        @endforeach
                                    <div>
                                            <span>
                                                <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$sinergy->first_champ}}.png" alt="" loading="lazy" class="m-0">
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="text-white fs-16 fw-bold" style="text-align: end">{{$sinergy->first_name}}</div>
                            </div>
                        </div>
                   
                    </div>
                </div>
                <div class="col-lg-6">
                    <div  class="row" style="background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$sinergy->second_champ}}_0.jpg');background-position:top;background-size: cover;">
                      
                        <div class="col-lg-9" style="padding: 2.5em;">
                            <div >
                                <div >
                                    <div style="display: flex;">
                                        <div>
                                            <span>
                                                <img width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$sinergy->second_champ}}.png" alt="" loading="lazy" class="m-0">
                                            </span>
                                        </div>

                                       

                                        @php
                                        $second_items = json_decode($sinergy->second_item );
                                        @endphp
                                        @foreach ($second_items as $item)
                                        {{--  data-popover id="item-{{$item->id}}" role="tooltip"  --}}
                                        {{-- <div style="width: 300px;"class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">{{$item->name}}</h3>
                                            </div>
                                        <div data-popper-arrow></div>
                                        </div> --}}
                                        {{-- data-popover-target="item-{{$item->id}}" --}}
                                        <div  style="align-self: flex-end;margin-left: .3em;">
                                            <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                        </div>
                                          @endforeach

                                    </div>
                                </div>
                                <div class="text-white fs-16 fw-bold">{{$sinergy->second_name}}</div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="align-self: center">
                            <img width="64px" src="https://cdn.mobalytics.gg/assets/common/icons/hex-tiers/{{$sinergy->tier}}.svg?2"  alt="s" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div id="accordion-collapse-body-{{$sinergy->id}}" class="hidden bg-lol-dark" aria-labelledby="accordion-collapse-heading-{{$sinergy->id}}">
            <div class="row">
                <div class="col-lg-6 col-12" style="border-right: 1px solid #0A1428;">
                    <div class="fs-20 fw-bold text-center text-lol-gold mt-2">Best Argument for: {{$sinergy->first_name}}</div>
                    <div class="row" style="margin: 10px;">
                        @php
                            $arguments = $sinergy->arguments(json_decode($sinergy->first_argument));
                            
                        @endphp
                        @foreach ($arguments as $argument)
                            <div class="col-lg-6 col-12 mt-1">
                                <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 200px;background: transparent;padding: 10px;border-color: #0A1428;">
                                    <h5 class="mb-2 font-bold tracking-tight text-white" style="font-size: 14px;">{{$argument->name}}</h5>
                                    <span style="padding: 0 .5em;text-transform: capitalize;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full ">{{$argument->type}}</span>
                                    <p class="text-gray-400" style="font-size: 14px;">{{$argument->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="fs-20 fw-bold text-center text-lol-gold mt-2">Best Argument for: {{$sinergy->second_name}}</div>
                    <div class="row" style="margin: 10px;">
                        @php
                            $arguments = $sinergy->arguments(json_decode($sinergy->second_argument));
                            
                        @endphp
                        @foreach ($arguments as $argument)
                            <div class="col-lg-6 col-12 mt-1">
                                <div class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 200px;background: transparent;padding: 10px;border-color: #0A1428;">
                                    <h5 class="mb-2 font-bold tracking-tight text-white" style="font-size: 14px;">{{$argument->name}}</h5>
                                    <span style="padding: 0 .5em;text-transform: capitalize;" class="bg-lol-gold text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full ">{{$argument->type}}</span>
                                    <p class="text-gray-400" style="font-size: 14px;">{{$argument->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
          </div>
@endforeach
</div>
<div class="col-lg-3 col-12 mt-3">
  <!-- Contenido de la segunda columna -->
  <div class="bg-lol-dark rounded p-2">
    <div class="text-lol-gold">
        <div class="fs-22 fw-bold">Best Champions Alone</div>
    </div>
  </div>
  <div class="mt-3 rounded">
    
    @foreach ($tiers as $tier)
        <div class="border-b" style="border-color: #0A1428;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$tier->champion}}_0.jpg');background-position:top;background-size: cover;height: 100px;">
            <div class="row" style="height: 100%;">
                
                <div class="col-8" style="align-self: center;margin: auto;">
                    <div style="display: flex;">
                        <img width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$tier->champion}}.png" alt="" loading="lazy" class="m-0">
                    <div class="fs-16 fw-bold ml-2 text-white" style="align-self: center;">{{$tier->real_name}}</div>
                    </div>
                </div>
                <div class="col-3" style="align-self: center">
                    
                        <img width="64px" src="https://cdn.mobalytics.gg/assets/common/icons/hex-tiers/{{$tier->tier}}.svg?2"  alt="s" loading="lazy">
                        
                </div>
            </div>
        </div>
    @endforeach  
 
  </div>
</div>
      
</div>