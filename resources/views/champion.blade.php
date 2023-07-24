<x-app-layout>
    <x-slot name="header">
        <a href="/champions">Volver</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('champion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200">
                    <div class="relative">
                      <img id="imageBanner" src="http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Aatrox_0.jpg" alt="Imagen de portada" class="w-full h-48 object-cover" style="height: 304px;
                      object-position: top;border-radius: 0.3em;">
                      <div class="absolute bottom-0 left-0" style="    position: absolute;
                      bottom: 1em;
                      left: 1em;display: flex;">
                        <img id="imageIconUrl" src="http://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/Aatrox.png" alt="Imagen de perfil" class="w-24 h-24 mx-4 -mb-12 border-4 border-white">
                        <div style="margin-left: 1em;color:#fff;">
                            <strong id="name">Champion</strong>
                            <p id="lore"></p>
                        </div>
                      </div>
                    </div>
                    <div class="flex">
                      <!-- Aquí puedes agregar el contenido adicional del perfil -->
                      <div role="alert" class="flex-initial w-32">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                          Tips como enemigo
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                          <p>"La supervivencia de Ahri se reduce drásticamente cuando su habilidad definitiva, Impulso Espiritual, no está disponible."</p>
                          <p>"Quédate detrás de tus súbditos para hacer que sea más difícil que te alcance con Encanto: así se reducirá en gran medida el daño potencial de Ahri"</p>
                        </div>
                      </div>
                      <div class="w-32 bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                        <p class="font-bold">Tips como aliado</p>
                        <p class="text-sm">Some additional text to explain said message.</p>
                      </div>
                    </div>
                  </div>
                  
            </div>
        </div>
    </div>

    <script>
        
        getChampions('13.14.1','es_AR','{{$name}}');
        function getChampions(version,idiom,name) {
            let api = `https://ddragon.leagueoflegends.com/cdn/${version}/data/${idiom}/champion/${name}.json`;
            fetch(api)
            .then(response => response.json())
            .then(data => {
                // Aquí puedes trabajar con los datos obtenidos
                console.log(data);
                showChampion(data)
            })
            .catch(error => {
                // Manejo de errores
                console.error('Error:', error);
            });
        }
        function showChampion(data){
            let imageBanner = document.getElementById('imageBanner');
            let imageIconUrl = document.getElementById('imageIconUrl');
            let name = document.getElementById('name');
            let lore = document.getElementById('lore');

            Object.keys(data.data).forEach(champion => {
                const championName = data.data[champion].name;
                name.textContent = championName;

                const championLore = data.data[champion].lore;
                lore.textContent = championLore;

                const championIconUrl = `https://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/${champion}.png`;
                imageIconUrl.src = championIconUrl;
                
                const championBannerUrl = `https://ddragon.leagueoflegends.com/cdn/img/champion/splash/${champion}_0.jpg`;
                imageBanner.src = championBannerUrl;
                console.log(championName);
            });
        }

    </script>
</x-app-layout>