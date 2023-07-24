@extends('admin.layout')

@section('title', 'Arguments')

@section('content')
    <div class="container-fluid">

      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

          <div class="mt-1">
            <a href="argument-create" class="btn btn-success">Agregar</a>
          </div>

        <div class="my-2">
          <form action="{{ route('argumentPanel', ['id'=>1]) }}" method="get">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <input type="text" class="form-control mb-1" name="name" value="{{$request->name}}" placeholder="Buscar por nombre">
                </div>
                <div class="col-lg-2 col-12">
                    <select class="form-select mb-1" name="order" placeholder="Orden">
                        <option @selected($request->order == 'asc') value='asc'>Ascendente</option>
                        <option @selected($request->order == 'desc') value='desc'>Descendente</option>
                    </select>
                </div>
                <div class="col-lg-2 col-12">
                    <button type="submit" class="btn btn-primary w-100 mb-1">Filtrar</button>
                </div>
              </div>
            </form>
        </div>
        <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">Arguments</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Id</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Name</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Type</h6>
                      </th>
                   
                      <th>

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($arguments as $key => $argument)
    
                        <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$argument->id}}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$argument->name}}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$argument->type}}</h6></td>
 
                        <td class="flex">
                            <a href="{{ route('argumentEdit', ['id'=>$argument->id]) }}" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#modal{{$argument->id}}">
                              Borrar
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$argument->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar objeto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    
                                    <table class="table text-nowrap mb-0 align-middle">
                                      <tbody>
                                        <tr>
                                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$argument->id}}</h6></td>
                                          <td class="border-bottom-0">
                                              <p class="mb-0 fw-normal w-50" style="overflow: hidden;">{{$argument->name}}</p>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('argumentDelete', ['id'=>$argument->id]) }}" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                        </tr> 
                    @endforeach
                  </tbody>
                </table>
                {{$arguments->links()}}
              </div>
            </div>
          </div>
    



    </div>

    
@endsection
