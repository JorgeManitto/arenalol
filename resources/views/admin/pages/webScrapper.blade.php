@extends('admin.layout')

@section('title', 'Champions')

@section('content')
    <div class="container-fluid">

      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

          <div class="mt-1">
            <form action="{{ route('colectData') }}" method="post">
                @csrf
                <button type="submit"class="btn btn-success">Agregar Campeones</button>
            </form>
          </div>
          <div class="mt-1">
            <a href="{{ route('scrapeSinergy') }}" class="btn btn-success">Agregar Sinergia</a>
          </div>
          <div class="mt-1">
            <a href="{{ route('scrapArgument') }}" class="btn btn-success">Agregar Argumentos</a>
          </div>



    </div>

    
@endsection
