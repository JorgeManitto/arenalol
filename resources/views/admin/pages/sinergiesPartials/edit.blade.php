@extends('admin.layout')

@section('title', 'Crear Sinergia')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Editar sinergia</div>
                <a href="/admin/sinergies" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form id="FormData" enctype="multipart/form-data" class="row" method="post" action="{{ route('sinergyUpdate') }}">
                @csrf
                <input type="hidden" name="first_champ" id="first_champ">
                <input type="hidden" name="second_champ" id="second_champ">
                <input type="hidden" name="first_name" id="first_name" value="{{$sinergy->first_name}}">
                <input type="hidden" name="second_name" id="second_name" value="{{$sinergy->second_name}}">
                <input type="hidden" name="first_item" id="first_item">
                <input type="hidden" name="second_item" id="second_item">
                <input type="hidden" name="id" value="{{$sinergy->id}}">
                <div class="mb-3">
                    <label for="name">Nombre de la sinergia</label>
                    <input type="text" name="name" class="form-control" value="{{$sinergy->name}}" required>
                </div>
                <div class="mb-3 rounded bg-lol">
        
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-xl sm:rounded-lg">
                                <div id="championData" class="parent text-white" style="height: 300px;overflow: auto;"></div>
                        </div>
                    </div>
                </div>
                <div class="mb-1 p-0">
                    <button type="button" class="btn btn-danger" onclick="clearChanpions()">Limpiar</button>
                </div>
                <div class="mb-3 p-3 rounded selected-champions bg-lol">
                    <div class="text-center">
                        <div style="display: flex;">
                            <div id="selectedItemsList1" style="align-items: end;
                            display: flex;"></div>
                            <img height="48px" id="firstImgChamp" src="http://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$sinergy->first_champ}}.png" alt="" srcset="">
                        </div>
                        <div class="styleName">
                            <span class="styleText text-white" id="firstChamp">{{$sinergy->first_champ}}</span>
                            <span class="styleText text-white" id="defaultFirst"></span>
                        </div>
                    </div>
                    <div  class="text-center">
                        <div style="display: flex;">
                            <img height="48px" id="secondImgChamp" src="http://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$sinergy->second_champ}}.png" alt="" srcset="">
                            <div id="selectedItemsList2" style="align-items: end;
                            display: flex;"></div>
                         </div>
                        <div class="styleName">
                            <span class="styleText text-white" id="secondChamp">{{$sinergy->second_champ}}</span>
                            <span class="styleText text-white" id="defaultSecond"></span>
                        </div>
                    </div>
                </div>
                
                <script>
                    let firstChamp = document.getElementById('firstChamp');
                    let secondChamp = document.getElementById('secondChamp');
                    
                    let firstImgChamp = document.getElementById('firstImgChamp');
                    let secondImgChamp = document.getElementById('secondImgChamp');

                    let defaultFirst = document.getElementById('defaultFirst');
                    let defaultSecond = document.getElementById('defaultSecond');
                    
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
                       
    

                        if(!firstChamp.textContent){
                            defaultFirst.textContent = '';
                            firstChamp.textContent = params;
                            firstImgChamp.src = img;
                            document.getElementById("first_name").value = realname;
                        }else if(!secondChamp.textContent){
                            defaultSecond.textContent = '';
                            secondChamp.textContent = params;
                            secondImgChamp.src = img;
                            document.getElementById("second_name").value = realname;
                        }
    
                    }
                    function clearChanpions(params) {
                        defaultFirst.textContent = 'Primer Campeón';
                        defaultSecond.textContent = 'Segundo Campeón';
                        firstChamp.textContent = '';
                        secondChamp.textContent = '';
                        firstImgChamp.src = '{{asset('champion.png')}}'
                        secondImgChamp.src = '{{asset('champion.png')}}'
                       
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
        

                <div class="mb-3">
                  <label for="status" class="form-label">Estado</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" @selected($sinergy->status == '0')>Inactivo</option>
                        <option value="1" @selected($sinergy->status == '1')>Activo</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="tier" class="form-label">Tier</label>
                    <select name="tier" id="tier" class="form-control">
                        <option @selected($sinergy->tier == 'S') value="S">S</option>
                        <option @selected($sinergy->tier == 'A') value="A">A</option>
                        <option @selected($sinergy->tier == 'B') value="B">B</option>
                        <option @selected($sinergy->tier == 'C') value="C">C</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="dificulty" class="form-label">Dificultad</label>
                    <select name="dificulty" id="dificulty" class="form-control">
                        <option value="0" @selected($sinergy->dificulty == '0')>Facil</option>
                        <option value="1" @selected($sinergy->dificulty == '1')>Media</option>
                        <option value="2" @selected($sinergy->dificulty == '2')>Dificil</option>
                    </select>
                </div>
              
               
                  <a href="/admin/sinergies" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
            </div>
          </div>
          
    </div>
@endsection    