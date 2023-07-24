@extends('admin.layout')

@section('title', 'Crear Sinergia')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Añadir una nueva sinergia</div>
                <a href="/admin/sinergies" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form id="FormData" enctype="multipart/form-data" class="row" method="post" action="{{ route('sinergySave') }}">
                @csrf
                <input type="hidden" name="first_champ" id="first_champ">
                <input type="hidden" name="second_champ" id="second_champ">
                <input type="hidden" name="first_name" id="first_name">
                <input type="hidden" name="second_name" id="second_name">
                <input type="hidden" name="first_item" id="first_item">
                <input type="hidden" name="second_item" id="second_item">
                <div class="mb-3">
                    <label for="name">Nombre de la sinergia</label>
                    <input type="text" name="name" class="form-control" required>
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
                            <img height="48px" id="firstImgChamp" src="{{asset('champion.png')}}" alt="" srcset="">
                        </div>
                        <div class="styleName">
                            <span class="styleText text-white" id="firstChamp"></span>
                            <span class="styleText text-white" id="defaultFirst">Primer Campeón</span>
                        </div>
                    </div>
                    <div  class="text-center">
                        <div style="display: flex;">
                            <img height="48px" id="secondImgChamp" src="{{asset('champion.png')}}" alt="" srcset="">
                            <div id="selectedItemsList2" style="align-items: end;
                            display: flex;"></div>
                         </div>
                        <div class="styleName">
                            <span class="styleText text-white" id="secondChamp"></span>
                            <span class="styleText text-white" id="defaultSecond">Segundo Campeón</span>
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

                <div class="mb-3 row ">
                    <div class="col-lg-6 col-12 text-center">
                        <div class="h4">Items primer campeón</div>
                    </div>
                    <div class="col-lg-6 col-12 text-center">
                        <div class="h4">Items segundo campeón</div>
                    </div>
                    <div class="col-lg-6 col-12 rounded bg-lol"style="height: 400px;overflow-y: auto;overflow-x: hidden;">
                        <div class="mt-1 mb-3 bg-white rounded" style="position:sticky;top:0;">
                            <input type="text" id="searchInput1" class="form-control" placeholder="Buscar...">
                        </div>
                        <div >
                            @foreach ($items as $item)
                                @php
                                $image = json_decode($item->image);
                                if (!json_decode($item->image)) {
                                    $image = str_replace('public', '/storage', $item->image);
                                } else {
                                    $image = 'https://ddragon.leagueoflegends.com/cdn/13.14.1/img/item/' . $image->full;
                                }
                                @endphp
                                <div onclick="itemSelected('1','{{ $item->id }}','{{  htmlentities($item->name) }}','{{ $image}}')" class="my-1 search-item-1" style="display: flex; justify-content: space-between;" data-name="{{ htmlentities($item->name_esp) }}" data-image="{{ $image }}">
                                    <img src="{{ $image }}" alt="" style="width: 48px;">
                                    <div class="text-white">{{ $item->name_esp }}</div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-lg-6 col-12 rounded bg-lol"style="height: 400px;overflow-y: auto;overflow-x: hidden;">
                        <div class="mt-1 mb-3 bg-white rounded" style="position:sticky;top:0;">
                            <input type="text" id="searchInput2" class="form-control" placeholder="Buscar...">
                        </div>
                        <div >
                            @foreach ($items as $item)
                                @php
                                $image = json_decode($item->image);
                                if (!json_decode($item->image)) {
                                    $image = str_replace('public', '/storage', $item->image);
                                } else {
                                    $image = 'https://ddragon.leagueoflegends.com/cdn/13.14.1/img/item/' . $image->full;
                                }
                                @endphp
                                <div onclick="itemSelected('2','{{ $item->id }}','{{ htmlentities($item->name) }}','{{ $image}}')" class="my-1 search-item-2" style="display: flex; justify-content: space-between;" data-name="{{ htmlentities($item->name_esp) }}" data-image="{{ $image }}">
                                    <img src="{{ $image }}" alt="" style="width: 48px;">
                                    <div class="text-white">{{ $item->name_esp }}</div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <script>
                    const searchInput1 = document.getElementById('searchInput1');
                    const searchItems1 = document.getElementsByClassName('search-item-1');

                    const searchInput2 = document.getElementById('searchInput2');
                    const searchItems2 = document.getElementsByClassName('search-item-2');



                    searchInput1.addEventListener('input', function () {
                    const searchTerm1 = searchInput1.value.toLowerCase();

                    for (let i = 0; i < searchItems1.length; i++) {
                        const name1 = searchItems1[i].getAttribute('data-name').toLowerCase();
                        const image1 = searchItems1[i].getAttribute('data-image');

                        if (name1.includes(searchTerm1)) {
                        searchItems1[i].style.display = 'flex';
                        } else {
                        searchItems1[i].style.display = 'none';
                        }
                    }
                    });

                    searchInput2.addEventListener('input', function () {
                    const searchTerm2 = searchInput2.value.toLowerCase();
                    console.log(searchTerm2);
                    for (let i = 0; i < searchItems2.length; i++) {
                        const name2 = searchItems2[i].getAttribute('data-name').toLowerCase();
                        const image2 = searchItems2[i].getAttribute('data-image');

                        if (name2.includes(searchTerm2)) {
                        searchItems2[i].style.display = 'flex';
                        } else {
                        searchItems2[i].style.display = 'none';
                        }
                    }
                    });

                    // Definir un array para almacenar los elementos seleccionados
                    let selectedItems1 = [];
                    let selectedItems2 = [];

                    function itemSelected(type, id, name, image) {

                    const listContainer1 = document.getElementById('selectedItemsList1');
                    const listContainer2 = document.getElementById('selectedItemsList2');

                    const selectedItem = { type, id, name, image };

                    const imgElement = document.createElement('img');
                    imgElement.src = image;
                    imgElement.setAttribute('onclick', `removeItem(event,'${id}','${type}')`);

                    imgElement.style.width = '24px';
                    imgElement.style.alalignself = 'end';

                    if(type == '1' && selectedItems1.length < 6){
                        selectedItems1.push(selectedItem);
                        listContainer1.appendChild(imgElement);
                    }else if(type == '2' && selectedItems2.length < 6){
                        selectedItems2.push(selectedItem);
                        listContainer2.appendChild(imgElement);
                    }
                    console.log(selectedItems1);
                    }
                    function removeItem(event,id,type){
                        event.target.remove()
                        if(type == '1'){
                            const filteredItems = selectedItems1.filter(item => item.id != id);
                            selectedItems1 = filteredItems;
                        }else if(type == '2'){
                            const filteredItems = selectedItems2.filter(item => item.id != id);
                            selectedItems2 = filteredItems;

                        }
                    }
                </script>
                <div class="row mb-3">
                    
                    <div class="col-lg-6 col-12">
                      <label for="first_argument" class="form-label">Argumento Primer Campeón</label>
                        <select name="first_argument[]" multiple id="first_argument" class="form-control">
                            @foreach ($arguments as $argument)
                            <option value="{{$argument->id}}">{{$argument->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6 col-12">
                      <label for="second_argument" class="form-label">Argumento Segundo Campeón</label>
                        <select name="second_argument[]" multiple id="second_argument" class="form-control">
                            @foreach ($arguments as $argument)
                            <option value="{{$argument->id}}">{{$argument->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Estado</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="tier" class="form-label">Tier</label>
                    <select name="tier" id="tier" class="form-control">
                        <option value="S">S</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="dificulty" class="form-label">Dificultad</label>
                    <select name="dificulty" id="dificulty" class="form-control">
                        <option value="0">Facil</option>
                        <option value="1">Media</option>
                        <option value="2">Dificil</option>
                    </select>
                </div>
              
               
                  <a href="/admin/sinergies" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
            </div>
          </div>
          <script>
            const FormData = document.getElementById('FormData');
            FormData.addEventListener("submit", function(event) {
                event.preventDefault();
                
                // Realiza cualquier manipulación necesaria con el valor del input aquí
                // Por ejemplo, puedes cambiar el valor del input a otro texto
                document.getElementById("first_champ").value = firstChamp.textContent;
                document.getElementById("second_champ").value = secondChamp.textContent;

                document.getElementById("first_item").value = JSON.stringify(selectedItems1);
                document.getElementById("second_item").value = JSON.stringify(selectedItems2);
                
                console.log(FormData);
                // Puedes hacer cualquier otra operación con los datos del formulario aquí
                
                // Luego puedes enviar el formulario de manera programática si lo deseas
                FormData.submit();
            });

          </script>
    </div>
@endsection    