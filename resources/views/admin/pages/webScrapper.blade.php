@extends('admin.layout')

@section('title', 'Champions')

@section('content')
    <div class="container-fluid">

      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
          
          <div class="row">
            <div class="col-lg-6">
              <h4>Items y argumentos</h4>
              <div class="mt-1">
                <a href="{{ route('scrapArgument') }}" class="btn btn-success">Agregar Argumentos</a>
              </div>
              <div class="mt-1">
                <a href="{{ route('itemsColect') }}" class="btn btn-success">Agregar Items</a>
              </div>
            </div>

            <div class="col-lg-6">
              <h4>Sinergias</h4>
              <div class="mt-1">
                <a href="{{ route('scrapeSinergy') }}" class="btn btn-success">Agregar Sinergia</a>
              </div>
            </div>

            <div class="col-lg-6 mt-4">
              <h4>Campeones</h4>
              <div class="mt-1">
                <a href="{{ route('championsColect') }}" class="btn btn-success">Agregar Campeones</a>
              </div>
              <div class="mt-1">
                <a href="{{ route('colectData') }}" class="btn btn-success">Agregar collectStatsData</a>
              </div>
              <div class="mt-1">
                <a href="{{ route('collectDataChampion') }}" class="btn btn-success">Agregar collectDataChampion</a>
              </div>
            </div>

          </div>


    </div>

    
@endsection
