@extends('admin.layout')

@section('title', 'Champions')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Añadir un nuevo argumento</div>
                <a href="/admin/arguments" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" class="row" method="post" action="{{ route('colectData') }}">
                @csrf
                <input type="hidden" name="first_name" id="first_name">
                <div class="mb-3 rounded bg-lol">
        
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-xl sm:rounded-lg">
                                <div id="championData" class="parent text-white" style="height: 300px;overflow: auto;"></div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 p-3 rounded selected-champions bg-lol">
                    <div class="text-center">
                        <div style="display: flex;">
                            <div id="selectedItemsList1" style="align-items: end;
                            display: flex;"></div>
                            <img height="48px" id="firstImgChamp" src="{{asset('champion.png')}}" alt="" srcset="">
                        </div>
                        <div class="styleName">
                            <span class="styleText text-white" id="firstChamp"></span>
                            <span class="styleText text-white" id="defaultFirst">Primer Campeón</span>
                        </div>
                    </div>
                </div>
                <script>
                    let firstChamp = document.getElementById('firstChamp');
                    let firstImgChamp = document.getElementById('firstImgChamp');
                    let defaultFirst = document.getElementById('defaultFirst');

                    getChampions('13.14.1','es_AR');
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
                    function championSelected(params, img,realname) {
                           defaultFirst.textContent = '';
                           firstChamp.textContent = params;
                           firstImgChamp.src = img;

                           document.getElementById("first_name").value = realname;
                    }
                    function showChampions(data){
                        const championDataDiv = document.getElementById('championData');
                        Object.keys(data.data).forEach(champion => {
                            
                            const championName = data.data[champion].name;
                            const championTitle = data.data[champion].title;
                            const championIconUrl = `http://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/${champion}.png`;
                            
                            const championElement = document.createElement('div');
                            championElement.classList = "contentChampion";
                            championElement.innerHTML = `
                                <img width="48px" src="${championIconUrl}" onclick="championSelected('${champion.replace("'", "\\'")}','${championIconUrl}','${championName.replace("'", "\\'")}')" alt="${championName} Icon" />
                                <span class="styleName">
                                    <span class="styleText">${championName}</span>
                                </span>
                                `;
                        
                            championDataDiv.appendChild(championElement);
                                
                        });

                        
                    }
                </script>

                <a href="/admin/arguments" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
            </div>
          </div>
    </div>
@endsection    