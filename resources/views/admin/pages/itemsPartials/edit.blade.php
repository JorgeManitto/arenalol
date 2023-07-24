@extends('admin.layout')

@section('title', 'Editar item')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Añadir un nuevo objeto</div>
                <a href="/admin/items" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" class="row" method="post" action="{{ route('itemUpdate') }}">
                <input type="hidden" name="id" value="{{$item->id}}">
                @csrf
            
                <div class="mb-3 col-lg-6">
                  <label for="name" class="form-label">Nombre ingles</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" aria-describedby="name">
                </div>
                <div class="mb-3 col-lg-6">
                  <label for="name_esp" class="form-label">Nombre español</label>
                  <input type="text" class="form-control" id="name_esp" value="{{$item->name_esp}}" name="name_esp" aria-describedby="name_esp">
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="description" class="form-label">Descripción en ingles</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$item->description}}</textarea>
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="description_esp" class="form-label">Descripción en español</label>
                  <textarea class="form-control" name="description_esp"  id="description_esp" cols="30" rows="10">{{$item->description_esp}}</textarea>
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="planitext" class="form-label">Planitext en ingles</label>
                  <textarea class="form-control" name="planitext" id="planitext" cols="30" rows="10">{{$item->plaintext}}</textarea>
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="planitext_esp" class="form-label">Planitext en español</label>
                  <textarea class="form-control" name="planitext_esp" id="planitext_esp" cols="30" rows="10">{{$item->plaintext_esp}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Icono</label>
                    @php
                        $image  = json_decode($item->image);
                            if(!json_decode($item->image)){
                              $image = str_replace('public','/storage',$item->image);
                            }else {
                              $image = 'https://ddragon.leagueoflegends.com/cdn/13.14.1/img/item/'.$image->full;
                            }
                    @endphp
                    <input type="file" @disabled(json_decode($item->image)) name="image" id="image" class="form-control">
                    @if ($image)  
                    <img width="200px" src="{{$image}}" alt="" srcset="">
                    @endif
                </div>

                <div class="mb-3">
                    @php
                        $gold   = json_decode($item->gold);
                            if(!json_decode($item->gold)){
                              $gold = $item->gold;
                            }else {
                              $gold = $gold->base;
                            }
                    @endphp
                    <label for="gold" class="form-label">Valor</label>
                    <input type="text" @disabled(json_decode($item->gold)) class="form-control" value="{{$gold}}" name="gold" id="gold">
                  </div>
  
                  <div class="mb-3">
                   
                    <label for="stats" class="form-label">Estadisticas</label>
                    <textarea class="form-control" @disabled(json_decode($item->stats)) name="stats" id="stats" cols="30" rows="10">{{$item->stats}}</textarea>
                  </div>
              
               
                  <a href="/admin/items" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
            </div>
          </div>
    </div>
@endsection    