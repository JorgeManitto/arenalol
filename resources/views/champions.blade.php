<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Champions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div id="championData" class="parent"></div>
            </div>
        </div>
    </div>
    
    <script>
        
        getChampions('13.13.1','es_AR');
        function getChampions(version,idiom) {
            let api = `https://ddragon.leagueoflegends.com/cdn/${version}/data/${idiom}/champion.json`;
            fetch(api)
            .then(response => response.json())
            .then(data => {
                // Aquí puedes trabajar con los datos obtenidos
                showChampions(data);
            })
            .catch(error => {
                // Manejo de errores
                console.error('Error:', error);
            });
        }

      function showChampions(data){
        const championDataDiv = document.getElementById('championData');
        Object.keys(data.data).forEach(champion => {
            
            const championName = data.data[champion].name;
            const championTitle = data.data[champion].title;
            const championIconUrl = `http://ddragon.leagueoflegends.com/cdn/13.13.1/img/champion/${champion}.png`;
            
            const championElement = document.createElement('div');
            championElement.classList = "contentChampion";
            championElement.innerHTML = `
                <img src="${championIconUrl}" alt="${championName} Icon" />
                <span class="styleName">
                    <span class="styleText">${championName}</span>
                </span>
                `;
            
            const LinkChampionElemnt = document.createElement('a');
            LinkChampionElemnt.href = `/champion/${champion}`;

            LinkChampionElemnt.appendChild(championElement)
            championDataDiv.appendChild(LinkChampionElemnt);
                
        });
        }
    </script>
</x-app-layout>