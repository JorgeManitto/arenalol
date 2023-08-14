<div>
    {{-- In work, do what you enjoy. --}}
    <form class="w-full max-w-lg" wire:submit="render">
        <div class="grid mb-6" style="gap: 0;">
          <div style="grid-column: span 3;" class="w-full  px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" style="margin-bottom: .5em;" for="championName">
              Champion Name
            </label>
            <input wire:model.debounce.500ms="championName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="championName" type="text" placeholder="Akali">
          </div>
            <div style="grid-column: span 1;" class="px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  style="margin-bottom: .5em;" for="tier">
                  Tier
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tier" wire:model.debounce.500ms="tier">
                    <option value="">All</option>
                    <option value="S+">S+</option>
                    <option value="S">S</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                  
                </div>
              </div>
            <div style="grid-column: span 1;" class=" px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  style="margin-bottom: .5em;" for="rol">
                  Rol
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="rol" wire:model.debounce.500ms="rol">
                    <option value="">All</option>
                    @foreach ($tags as $tag)
                        <option value="{{$tag}}">{{$tag}}</option>
                    @endforeach
                  </select>
                  
                </div>
              </div>
          
          
            
        </div>
    </form>
    <div class="grid">
        @foreach ($champions as $champion)
        @php
            $imagen = json_decode($champion->image);
        @endphp
        <a href="{{ route('champion', ['name'=>$champion->slug_name]) }}" class="featured bg-lol-dark">
            <img width="48px" height="48px" style="object-fit: cover;" src="https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$imagen->full}}" alt="" loading="lazy" class="m-0">
            <div class="text-white" style="font-size: 11px; text-align: end;line-height: 1;">
                <div style="font-size: 20px;font-weight: bold;">{{$champion->name}}</div>
                <div class="text-lol-gold">Tier: {{$champion->tier}}</div>
                <div class="text-lol-gold">Win-Rate: {{$champion->win}}</div>
            </div>
        </a>
        @endforeach
       
    </div>
</div>

<script>
    var debounceTimer;
    var interaction = true;
    // var spinner_videos = document.getElementById('spinner-videos');
    function handleScroll() {
        // spinner_videos.style.display = "block";
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function() {

            var scrollPosition = window.innerHeight + window.scrollY;
        var documentHeight = document.body.offsetHeight;
        var triggerPoint = documentHeight * 0.8; // 80% de la página

        if (scrollPosition >= triggerPoint) {
            Livewire.emit('loadMore');
            // spinner_videos.style.display = 'none';
            }
        }, 300);
    }

    document.addEventListener('scroll', handleScroll);
</script>