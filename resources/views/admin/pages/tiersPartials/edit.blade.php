@extends('admin.layout')

@section('title', 'Editar Tier')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Añadir un nuevo tier</div>
                <a href="/admin/tiers" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form class="row" method="post" id="FormData" action="{{ route('tierUpdate') }}">
                @csrf
                <input type="hidden" name="real_name" id="real_name" value="{{$tier->real_name}}">
                <input type="hidden" name="champion" id="champion" value="{{$tier->champion}}">
                <input type="hidden" name="id" value="{{$tier->id}}">

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
                            <img height="48px" id="firstImgChamp" src="http://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$tier->champion}}.png" alt="{{$tier->real_name}}">
                        </div>
                        <div class="styleName">
                            <span class="styleText text-white" id="firstChamp">{{$tier->champion}}</span>
                            <span class="styleText text-white" id="defaultFirst"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Estado</label>
                      <select name="status" id="status" class="form-control">
                          <option @selected($tier->status == '0') value="0">Inactivo</option>
                          <option @selected($tier->status == '1') value="1">Activo</option>
                      </select>
                  </div>

               <div class="mb-3">
                  <label for="tier" class="form-label">Tier</label>
                    <select name="tier" id="tier" class="form-control">
                        <option @selected($tier->tier == 'S') value="S">S</option>
                        <option @selected($tier->tier == 'A') value="A">A</option>
                        <option @selected($tier->tier == 'B') value="B">B</option>
                        <option @selected($tier->tier == 'C') value="C">C</option>
                    </select>
                </div>

               
                  <a href="/admin/tiers" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
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
                console.log(realname);
                document.getElementById("real_name").value = realname;
           

        }
        function clearChanpions(params) {
            defaultFirst.textContent = 'Elige un Campeón';
            firstChamp.textContent = '';
            firstImgChamp.src = '{{asset('champion.png')}}'
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
        const FormData = document.getElementById('FormData');
            FormData.addEventListener("submit", function(event) {
                event.preventDefault();
                
                // Realiza cualquier manipulación necesaria con el valor del input aquí
                // Por ejemplo, puedes cambiar el valor del input a otro texto
                document.getElementById("champion").value = firstChamp.textContent;
                
                // Luego puedes enviar el formulario de manera programática si lo deseas
                FormData.submit();
            });
    </script>
@endsection    