<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hogar</title>
    <style type="text/css">
        .color-text{
             color: black;
        }
        .ocultar{
          display: none;
        }
        
        
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: white;">
     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: #01DF74; ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>  
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
<form class="d-flex" action="{{route('client.search')}}" method="POST">
   @csrf
        <input class="form-control col-10" type="search" name="key" placeholder="Buscar" >
        <button class="btn btn-dark" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
        </button>
</form>
              </ul>
@if(url()->current() == url("/carrito"))
@else
                    <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       
          <li class="nav-item dropdown">
            <a href="{{route('client.car')}}"><button type="button" class="btn btn-dark " >
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/> </svg> 
  @if (empty(session('carrito')))
  @else
   <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">  {{count(session('carrito'))}} </span>
  @endif 
</button></a> </li>
 @endif                 
                    </ul>
                </div>
            </div>
        </nav>

</nav>
        <main>
            @yield('content')
        </main>
               <nav class="navbar navbar-expand-lg  " style="background-color: black; ">
  <div class="container-fluid " >
    <a class="navbar-brand " style="color: white;" href="#">Acerca</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" style="color: white;"  href="#">Tel 6335633 </a>
        </li>
      <li class="nav-item">
          <a class="nav-link  " aria-current="page" style="color: white;" href="#">Politicas de uso</a>
        </li>
         <li class="nav-item">
          <a class="nav-link  " aria-current="page" style="color: white;" href="#"> 2021 © Everlever todos los derechos reservados</a>
        </li>
      </ul>
   
    </div>
  </div>
</nav>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <!-- <script>
     function add() {
            $.ajax({
               type:'POST',
               url:'/producto/agregar/carrito',
               data:$('#form1').serialize(),
               success:function(data) {
                  $("#response").html(data);
               }
            })
         }
      </script> -->
</body>
</html>
