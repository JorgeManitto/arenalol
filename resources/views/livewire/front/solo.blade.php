<div class="row">
    <div class="col-lg-9">
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
                                <img style="margin: auto;" width="64px" src="{{asset("assets/images/$logo_tier")}}.png"  alt="{{$logo_tier}}" loading="lazy">
                                    
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach  
         
          </div>
    
        <div id="loader" style="margin: 1.5em auto;text-align: center;">
            <span class="loader"></span>
        </div>
        
    </div>
    <div class="col-lg-3">
        <div class="bg-lol-dark" style="position: relative;border: 1px solid #0A1428;width: 100%;height: 300px;">
            <div style="margin: auto;width: 105px;height: 50px;color:#fff;position: absolute;top: 0;left: 0;bottom: 0;right: 0;">publicity space</div>
        </div>
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