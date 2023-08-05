@extends('admin.layout')

@section('title', 'Editar Campeón')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Editar Campeón</div>
                <a href="/admin/champions" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form id="FormData" enctype="multipart/form-data" class="row" method="post" action="{{ route('championUpdate') }}">
                @csrf
                <input type="hidden" name="id" value="{{$champion->id}}">
                <input type="hidden" name="slug_name" value="{{$champion->slug_name}}">
                <input type="hidden" name="build" id="build">
                <div class="mb-3 col-12">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="name" value="{{$champion->name}}" name="name" aria-describedby="name">
                </div>
                <div class="mb-3 p-3 rounded selected-champions bg-lol">
                  <div class="text-center">
                      <div style="display: flex;">
                          <div id="selectedItemsList1" style="align-items: end;
                          display: flex;"></div>
                          <img height="48px" id="firstImgChamp" src="http://ddragon.leagueoflegends.com/cdn/13.14.1/img/champion/{{$champion->slug_name}}.png" alt="" srcset="">
                      </div>
                      <div class="styleName">
                          <span class="styleText text-white" id="firstChamp">{{$champion->name}}</span>
                          <span class="styleText text-white" id="defaultFirst"></span>
                      </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="rounded bg-lol"style="height: 400px;overflow-y: auto;overflow-x: hidden;padding:0 1em;">
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
                            <div onclick="itemSelected('1','{{ $item->id }}','{{  htmlentities($item->name_esp) }}','{{ $image}}')" class="my-1 search-item-1" style="display: flex; justify-content: space-between;" data-name="{{ htmlentities($item->name_esp) }}" data-image="{{ $image }}">
                                <img src="{{ $image }}" alt="" style="width: 48px;">
                                <div class="text-white">{{ $item->name_esp }}</div>
                            </div>
                        @endforeach
                    </div>

                </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
                <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
                
              <div class="mb-3">
                <label for="arguments">Argumentos</label> 
                @php
                    $champArguments = json_decode($champion->argument) ? json_decode($champion->argument) : [];
                @endphp
                <select id="arguments" name="arguments[]" placeholder="Selecione los argumentos" multiple>
                  @foreach ($arguments as $argument)
                  <option @selected(in_array($argument->id, $champArguments)) value="{{$argument->id}}">{{$argument->name}}</option>
                  @endforeach
                </select>       
              </div>
               <div class="mb-3">
                  <label for="tier" class="form-label">Tier</label>
                    <select name="tier" id="tier" class="form-control">
                        <option @selected($champion->tier == 'S+') value="S+">S+</option>
                        <option @selected($champion->tier == 'S') value="S">S</option>
                        <option @selected($champion->tier == 'A') value="A">A</option>
                        <option @selected($champion->tier == 'B') value="B">B</option>
                        <option @selected($champion->tier == 'C') value="C">C</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="win">Win Rate:</label>
                  <input type="text" value="{{$champion->win}}" name="win" id="win" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="pick">Pick Rate:</label>
                  <input type="text" value="{{$champion->pick}}" name="pick" id="pick" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="ban">Ban Rate:</label>
                  <input type="text" value="{{$champion->ban}}" name="ban" id="ban" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="games">Total games:</label>
                  <input type="text" value="{{$champion->games}}" name="games" id="games" class="form-control">
                </div>
                
                <div class="mb-3">
                  <label for="best_duo">Mejores duos</label> 
                  @php
                      $best_duo = json_decode($champion->best_duo) ? json_decode($champion->best_duo) : [];
                  @endphp
                  <select id="best_duo" name="best_duo[]" placeholder="Selecione los campeones" multiple>
                    @foreach ($champions as $value)
                    <option @selected(in_array($value->name, $best_duo)) value="{{$value->name}}">{{$value->name}}</option>
                    @endforeach
                  </select>       
                </div>

                <div class="mb-3">
                  <label for="bad_duo">Peores duos</label> 
                    @php
                      $bad_duo = json_decode($champion->bad_duo) ? json_decode($champion->bad_duo) : [];
                    @endphp
                  <select id="bad_duo" name="bad_duo[]" placeholder="Selecione los campeones" multiple>
                    @foreach ($champions as $value)
                    <option @selected(in_array($value->name, $bad_duo)) value="{{$value->name}}">{{$value->name}}</option>
                    @endforeach
                  </select>       
                </div>
                <div class="mb-3">
                  <label for="to_counter">Counter</label> 
                    @php
                      $to_counter = json_decode($champion->to_counter) ? json_decode($champion->to_counter) : [];
                    @endphp
                  <select id="to_counter" name="to_counter[]" placeholder="Selecione los campeones" multiple>
                    @foreach ($champions as $value)
                    <option @selected(in_array($value->name, $to_counter)) value="{{$value->name}}">{{$value->name}}</option>
                    @endforeach
                  </select>       
                </div>
                <div class="mb-3">
                  <label for="best_for">Mejor contra</label> 
                    @php
                      $best_for = json_decode($champion->best_for) ? json_decode($champion->best_for) : [];
                    @endphp
                  <select id="best_for" name="best_for[]" placeholder="Selecione los campeones" multiple>
                    @foreach ($champions as $value)
                    <option @selected(in_array($value->name, $best_for)) value="{{$value->name}}">{{$value->name}}</option>
                    @endforeach
                  </select>       
                </div>
                <script>
                  $(document).ready(function(){
                    
                    var multipleCancelButton = new Choices('#best_duo', {
                      removeItemButton: true,
                    }); 
                    var multipleCancelButton = new Choices('#bad_duo', {
                      removeItemButton: true,
                    }); 
                    var multipleCancelButton = new Choices('#to_counter', {
                      removeItemButton: true,
                    }); 
                    var multipleCancelButton = new Choices('#best_for', {
                      removeItemButton: true,
                    }); 
                    var multipleCancelButton = new Choices('#arguments', {
                      removeItemButton: true,
                    }); 
                    
                    
                });
                </script>

               
                <a href="/admin/champions" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
            </div>
          </div>
    </div>
    <script>
      const searchInput1 = document.getElementById('searchInput1');
      const searchItems1 = document.getElementsByClassName('search-item-1');
    
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
        @if ($champion->build) 

          let selectedItems1 = {!!($champion->build)!!};
         @else 
          let selectedItems1 = [];
        @endif

        showItemSelected(selectedItems1)
        function showItemSelected(params) {
          const listContainer1 = document.getElementById('selectedItemsList1');

          params.forEach(element => {
              const imgElement = document.createElement('img');
              imgElement.src = element.image;
              imgElement.setAttribute('onclick', `removeItem(event,'${element.id}','${element.type}')`);

              imgElement.style.width = '24px';
              imgElement.style.alalignself = 'end';

              listContainer1.appendChild(imgElement);
          });
        }


      function itemSelected(type, id, name, image) {
        const listContainer1 = document.getElementById('selectedItemsList1');

        const selectedItem = { type, id, name, image };

        const imgElement = document.createElement('img');
        imgElement.src = image;
        imgElement.setAttribute('onclick', `removeItem(event,'${id}','${type}')`);

        imgElement.style.width = '24px';
        imgElement.style.alalignself = 'end';

        if(selectedItems1.length < 7){
            selectedItems1.push(selectedItem);
            listContainer1.appendChild(imgElement);
        }

        }
        function removeItem(event,id,type){
          event.target.remove();
          const filteredItems = selectedItems1.filter(item => item.id != id);
          selectedItems1 = filteredItems;
        }
        const FormData = document.getElementById('FormData');
            FormData.addEventListener("submit", function(event) {
                event.preventDefault();
  

                document.getElementById("build").value = JSON.stringify(selectedItems1);
                
                console.log(FormData);
                // Puedes hacer cualquier otra operación con los datos del formulario aquí
                
                // Luego puedes enviar el formulario de manera programática si lo deseas
                FormData.submit();
            });
    </script>
@endsection    
