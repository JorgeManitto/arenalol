<div class="row col-lg-9 col-12" id="accordion-collapse" data-accordion="collapse" style="margin: 0em auto;">
    @foreach ($sinergies as $sinergy)
            <a href="{{ route('synergy', ['id'=>$sinergy->id,'names' => $sinergy->first_champ.'-'.$sinergy->second_champ]) }}" style="cursor: pointer;" class="col-12 shadow-xl sm:rounded-lg mt-3">
               
                <div class="row">     
                    <div class="col-lg-6">
                        <div class="row h-lg-160 h-200" style="padding: 2em;justify-content: center;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$sinergy->first_champ}}_0.jpg');background-position:top;background-size: cover;">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="fs-22 fw-bold" >
                                            <div class="fs-16 text-lol-gold">Duo</div>
                                        </div>
                                        <div>
                                            <span class="text-xs font-medium mr-2 bg-lol-gold text-white rounded " style="padding: 0 .5em;">{{$version}}</span>
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
                                <img style="margin-left: auto;" width="64px" src="{{asset("assets/images/$logo_tier")}}.png"  alt="s" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
    
    
    
            </a>
            
    @endforeach
    <div id="loader" style="margin: 1.5em auto;text-align: center;">
        <span class="loader"></span>
    </div>
</div>

<script>
var debounceTimer;
var interaction = true;
function handleScroll() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(function() {

        var scrollPosition = window.innerHeight + window.scrollY;
    var documentHeight = document.body.offsetHeight;
    var triggerPoint = documentHeight * 0.9; // 80% de la página

    if (scrollPosition >= triggerPoint) {
        Livewire.emit('loadMore');
        }
    }, 300);
}

document.addEventListener('scroll', handleScroll);
</script>