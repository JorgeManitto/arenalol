<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('/assets/css/styles.min.css')}}" />
  <style>
  .parent {
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    grid-template-rows: repeat(5, 1fr);
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    padding: 1em;
    width: 100%;
    margin: auto;
  }
  .contentChampion {
      width: 48px;
      margin: 0.5em auto;
      cursor: pointer;
  }
  .selected-champions{
    /* width: 500px; */
    display: flex;
    justify-content: space-evenly;
    margin: auto;
  }
 .bg-lol{
  background: rgb(6, 28, 37);
 }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    @include('admin.components.menu')

    <!--  Main wrapper -->
    <div class="body-wrapper">
        @include('admin.components.header')

      @yield('content')
      
    </div>
  </div>
  <script src="{{asset('/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
</body>

</html>