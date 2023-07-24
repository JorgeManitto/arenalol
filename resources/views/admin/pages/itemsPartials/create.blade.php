@extends('admin.layout')

@section('title', 'Crear Item')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Añadir un nuevo objeto</div>
                <a href="/admin/items" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" class="row" method="post" action="{{ route('itemSave') }}">
                @csrf
                <div class="mb-3 col-lg-6">
                  <label for="name" class="form-label">Nombre ingles</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
                </div>
                <div class="mb-3 col-lg-6">
                  <label for="name_esp" class="form-label">Nombre español</label>
                  <input type="text" class="form-control" id="name_esp" name="name_esp" aria-describedby="name_esp">
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="description" class="form-label">Descripción en ingles</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="description_esp" class="form-label">Descripción en español</label>
                  <textarea class="form-control" name="description_esp" id="description_esp" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="planitext" class="form-label">Planitext en ingles</label>
                  <textarea class="form-control" name="planitext" id="planitext" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="planitext_esp" class="form-label">Planitext en español</label>
                  <textarea class="form-control" name="planitext_esp" id="planitext_esp" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Icono</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="gold" class="form-label">Valor</label>
                    <input type="text" class="form-control" name="gold" id="gold">
                  </div>
  
                  <div class="mb-3">
                    <label for="stats" class="form-label">Estadisticas</label>
                    <textarea class="form-control" name="stats" id="stats" cols="30" rows="10"></textarea>
                  </div>
              
               
                  <a href="/admin/items" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
            </div>
          </div>
    </div>
@endsection    