<div class="row">
    <div class="row col-lg-9 col-12" id="accordion-collapse" data-accordion="collapse" style="margin: 0em auto;">

@foreach ($sinergies as $sinergy)
        <a href="{{ route('synergy', ['id'=>$sinergy->id]) }}" style="cursor: pointer;" class="col-12 shadow-xl sm:rounded-lg mt-3">
           
            <div class="row">     
                <div class="col-lg-6">
                    <div class="row h-lg-160 h-200" style="padding: 2em;justify-content: center;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$sinergy->first_champ}}_0.jpg');background-position:top;background-size: cover;">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col">
                                    <div class="fs-22 fw-bold" >
                                        <div class="fs-16 text-lol-gold">{{$sinergy->name}}</div>
                                    </div>
                                    <div>
                                        <span class="bg-gray-100 text-xs font-medium mr-2 bg-lol-gold text-white rounded " style="padding: 0 .5em;">{{$version}}</span>
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
                        
                        <div class="col-lg-8">
                            <div >
                                <div >
                                    <div style="display: flex;justify-content: flex-end;">
                                      @php
                                      $first_items = json_decode($sinergy->first_champ_build );
                                      @endphp
                                        @if($first_items)
                                            @foreach ($first_items as $item)
                                                <div  style="align-self: flex-end;margin-right: .3em;">
                                                    <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                                </div>
                                            @endforeach
                                        @endif    
                                    <div>
                                            <span>
                                                <img style="margin: auto;" width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$sinergy->first_champ}}.png" alt="" loading="lazy" class="m-0">
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="text-white fs-16 fw-bold" style="text-align: end"><span class="bg-lol-dark" style="border-radius: .3em;padding: 0 .3em;">{{$sinergy->first_name}}</span></div>
                                @php
                                    $argumentsSynergies = json_decode($sinergy->first_champ_argument)? json_decode($sinergy->first_champ_argument) : [];
                                    
                                @endphp
                                <div class="text-white" style="display:flex;justify-content: end;">
                                    @foreach ($argumentsSynergies as $itemargument)
                                        <div  class="tooltip bg-lol-dark" style="border:1px solid #fff;border-radius:.3em;margin: 0 .3em;">
                                            <img src="{{$sinergy->argument($itemargument)->src}}" alt="" width="24px">
                                            <span class="bg-lol-dark tooltip-text">
                                                <img style="margin: auto;" src="{{$sinergy->argument($itemargument)->src}}" alt="" width="24px">
                                                <div class="fw-bold text-lol-gold mt-1" style="font-size: 11px;text-align: center;">{{$sinergy->argument($itemargument)->type}}</div>
                                                <div style="text-align: center;">{{$sinergy->argument($itemargument)->name}}</div>
                                                <div>{{$sinergy->argument($itemargument)->description}}</div>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                   
                    </div>
                </div>
                <div class="col-lg-6">
                    <div  class="row  h-lg-160 h-200" style="justify-content: center;padding: 1.9em;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$sinergy->second_champ}}_0.jpg');background-position:top;background-size: cover;">
                      
                        <div class="col-lg-9">
                            <div >
                                <div >
                                    <div style="display: flex;">
                                        <div>
                                            <span>
                                                <img width="48px" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$sinergy->second_champ}}.png" alt="" loading="lazy" class="m-0">
                                            </span>
                                        </div>

                                       

                                        @php
                                        $second_items = json_decode($sinergy->second_champ_build );
                                        @endphp
                                        @if($second_items)
                                            @foreach ($second_items as $item)
                                                <div  style="align-self: flex-end;margin-left: .3em;">
                                                    <img width="24px" src="{{$item->image}}" alt="{{$item->name}}" loading="lazy" class="m-0">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="text-white fs-16 fw-bold"><span class="bg-lol-dark" style="border-radius: .3em;padding: 0 .3em;">{{$sinergy->second_name}}</span></div>
                                @php
                                $argumentsSynergiesSecond = json_decode($sinergy->second_champ_argument)? json_decode($sinergy->second_champ_argument) : [];
                                // dd($argumentsSynergies);
                                @endphp
                                <div class="text-white" style="display:flex;justify-content: start;">
                                    @foreach ($argumentsSynergiesSecond as $itemargument)
                                        <div  class="tooltip bg-lol-dark" style="border:1px solid #fff;border-radius:.3em;margin: 0 .3em;">
                                            <img src="{{$sinergy->argument($itemargument)->src}}" alt="" width="24px">
                                            <span class="bg-lol-dark tooltip-text">
                                                <img style="margin: auto;" src="{{$sinergy->argument($itemargument)->src}}" alt="" width="24px">
                                                <div class="fw-bold text-lol-gold mt-1" style="font-size: 11px;text-align: center;">{{$sinergy->argument($itemargument)->type}}</div>
                                                <div style="text-align: center;">{{$sinergy->argument($itemargument)->name}}</div>
                                                <div>{{$sinergy->argument($itemargument)->description}}</div>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="align-self: center">
                            @php
                                $logo_tier = $sinergy->tier == 'S+' ? 'S-plus' :$sinergy->tier;
                            @endphp
                            <img width="64px" src="{{asset("assets/images/$logo_tier")}}.png"  alt="s" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>



        </a>
        
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
        <div class="border-b" style="border-color: #0A1428;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$tier->slug_name}}_0.jpg');background-position:top;background-size: cover;height: 100px;">
            <div class="row" style="height: 100%;">
                
                <div class="col-8" style="align-self: center;margin: auto;">
                    <div style="display: flex;">
                        <img width="48px" height="48px" style="object-fit: cover;" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$tier->slug_name}}.png" alt="" loading="lazy" class="m-0">
                    <div style="align-self: center;">
                        <div class="fs-16 fw-bold ml-2 text-white">{{$tier->name}}</div>
                        <div style="font-size: 11px;" class="fw-bold ml-2 text-lol-gold">Win-rate: <span class="text-white">{{$tier->win}}</span></div>
                        <div style="font-size: 11px;" class="fw-bold ml-2 text-lol-gold">Pick-rate: <span class="text-white">{{$tier->pick}}</span></div>
                    </div>
                    </div>
                </div>
                <div class="col-3" style="align-self: center">
                    @php
                        $logo_tier = $sinergy->tier == 'S+' ? 'S-plus' :$sinergy->tier;
                    @endphp
                    <img width="64px" src="{{asset("assets/images/$logo_tier")}}.png"  alt="s" loading="lazy">
                        
                </div>
            </div>
        </div>
    @endforeach  
 
  </div>
</div>
<div class="col-lg-9 mt-4">
    {{$sinergies->links()}}
</div>

</div>