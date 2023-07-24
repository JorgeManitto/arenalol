@extends('admin.layout')

@section('title', 'Crear Argumento')

@section('content')
    <div class="container-fluid">
        <div class="card w-75 m-auto shadow-lg">
            <div class="card-header row">
                <div class="h4 col-lg-10 mb-1">Añadir un nuevo argumento</div>
                <a href="/admin/arguments" class="btn btn-primary mb-1 text-center col-lg-2">Volver</a>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" class="row" method="post" action="{{ route('argumentUpdate') }}">
                @csrf
                <input type="hidden" name="id" value="{{$argument->id}}">
                <div class="mb-3 col-lg-6">
                  <label for="name" class="form-label">Nombre ingles</label>
                  <input type="text" class="form-control" id="name" value="{{$argument->name}}" name="name" aria-describedby="name">
                </div>
                <div class="mb-3 col-lg-6">
                  <label for="name_esp" class="form-label">Nombre español</label>
                  <input type="text" class="form-control" id="name_esp" value="{{$argument->name_esp}}" name="name_esp" aria-describedby="name_esp">
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="description" class="form-label">Descripción en ingles</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$argument->description}}</textarea>
                </div>

                <div class="mb-3 col-lg-6">
                  <label for="description_esp" class="form-label">Descripción en español</label>
                  <textarea class="form-control" name="description_esp" id="description_esp" cols="30" rows="10">{{$argument->description_esp}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" class="form-control" id="type">
                        <option @selected($argument->type = 'silver') value="silver">Silver</option>
                        <option @selected($argument->type = 'gold') value="gold">Gold</option>
                        <option @selected($argument->type = 'prismatic') value="prismatic">Prismatic</option>
                    </select>
                </div>

               
                  <a href="/admin/arguments" class="btn btn-primary mb-1">Volver</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                
              </form>
            </div>
          </div>
    </div>
@endsection    