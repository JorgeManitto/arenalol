@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">

      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

          <div class="mt-1">
            <a href="item-create" class="btn btn-success">Agregar</a>
          </div>
        <div class="my-2">
          <form action="{{ route('itemsPanel', ['id'=>1]) }}" method="get">
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
              <h5 class="card-title fw-semibold mb-4">Items</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Id</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Image</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Name</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Descripction</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Budget</h6>
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $key => $item)
                        @php
                        
                            $image  = json_decode($item->image);
                            if(!json_decode($item->image)){
                              $image = str_replace('public','/storage',$item->image);
                            }else {
                              $image = 'https://ddragon.leagueoflegends.com/cdn/13.14.1/img/item/'.$image->full;
                            }

                            $gold   = json_decode($item->gold);
                            
                            if(is_numeric($item->gold)){
                              $gold = $item->gold;
                            }else if(json_decode($item->gold)){
                              $gold = $gold->base;
                            }
                        @endphp
                        <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$item->id}}</h6></td>
                        <td class="border-bottom-0">
                            <img width="48px" height="48px" src="{{$image}}" class="rounded-2" alt="{{$item->name}}">                         
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal" style="text-wrap: wrap;">{{$item->name}}</p>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal" style="text-wrap: wrap;">{{$item->plaintext}}</p>
                        </td>
                        
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">${{$gold}}</h6>
                        </td>
                        <td class="flex">
                            <a href="{{ route('itemEdit', ['id'=>$item->id]) }}" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal" data-bs-target="#modal{{$item->id}}">
                              Borrar
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$item->id}}</h6></td>
                                          <td class="border-bottom-0">
                                              <img width="48px" height="48px" src="{{$image}}" class="rounded-2" alt="{{$item->name}}">                         
                                          </td>
                                          <td class="border-bottom-0">
                                              <p class="mb-0 fw-normal w-50" style="overflow: hidden;">{{$item->name}}</p>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('itemDelete', ['id'=>$item->id]) }}" method="post">
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
                {{$items->links()}}
              </div>
            </div>
          </div>
    



    </div>

    
@endsection
