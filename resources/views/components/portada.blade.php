<div class="row">
 
    @livewire('front.synergy-scroll',['version' => $version])
<div class="col-lg-3 col-12 mt-3 d-none d-lg-block">
  <!-- Contenido de la segunda columna -->
  <div class="bg-lol-dark rounded p-2">
    <div class="text-lol-gold">
        <div class="fs-22 fw-bold">Best Champions Alone</div>
    </div>
  </div>
  <div class="mt-3 rounded">
    
    @foreach ($tiers as $tier)
        <div class="border-b" style="border-color: #0A1428;background-image:url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{$tier->slug_name}}_0.jpg');background-position:top;background-size: cover;height: 100px;">
            <a href="{{ route('champion', ['name'=>$tier->slug_name]) }}">
                <div class="row" style="height: 100%;">
                    
                    <div class="col-8" style="align-self: center;margin: auto;">
                        <div style="display: flex;" class="border-champion">
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
                            $logo_tier = $tier->tier == 'S+' ? 'S-plus' :$tier->tier;
                        @endphp
                        <img width="64px" src="{{asset("assets/images/$logo_tier")}}.png"  alt="s" loading="lazy">
                            
                    </div>
                </div>
            </a>
        </div>
    @endforeach  
 
  </div>
</div>
</div>