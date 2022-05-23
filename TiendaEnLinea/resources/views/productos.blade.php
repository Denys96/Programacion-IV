@extends('layouts.myapp')

@section('content')

<div class="container" >
<h5 style="margin-top: 10px;">Información del producto </h5><div id="response"></div>
<div class="row" >

    <div class="col-md-7" style="margin-bottom: 10px;">
   
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
   
     @foreach ($images as $image)
          @if ($loop->first)
                <div class="carousel-item active">
                  <img src="{{asset('storage').'/'.$image->name}}" class="d-block w-100" height="500">
                </div>  
          @else
                <div class="carousel-item ">
                  <img src="{{asset('storage').'/'.$image->name}}" class="d-block w-100" height="500">
                </div>
         @endif
   @endforeach 
 
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    
  </button>
</div>
    </div>
    <div class="col-md-4">
       @foreach ($products as $product)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <!-- <p class="card-text">Precio anterior</p> -->
          <p class="card-text">$ {{$product->price}}.Dlr</p>
          <form action="{{route('client.add')}}" method="POST">
            
        @csrf 
                   <input type="hidden" name="name" value="{{$product->name}}">
                  <input type="hidden" name="price" value="{{$product->price}}">
                  <input type="hidden" name="idproduct" value="{{$product->idproduct}}">
             @if (empty($product->size))

              @else
                 <select class="form-select form-select-lg mb-3" name="size" aria-label=".form-select-lg example" required>
                      <option value="">Seleccione la talla</option>
                      <?php 
                         $f=1;

                         $longitud =strlen($product->size);
                         $resultados=array();
                         $resultado='';
                      ?>
                      @for ($i = 0; $i < $longitud; $i++)
                         @if ($product->size[$i] ==',')
                           <option value="{{$resultado}}">{{$resultado}}</option>
                           <?php  $resultado=''; ?>
                        @else
                          <?php  $resultado.=$product->size[$i];?> 
                        @endif
                        @if($f==$longitud)
                          <option value="{{$resultado}}">{{$resultado}}</option>
                         @endif
                      <?php $f++; ?>
                      @endfor
                     
                                 
                  </select>  
            @endif
        
       
          <br>
          Cantidad
          <input style="width: 50px;" type="number" name="quantity" value="1" required><br><br>
          <button class="btn btn-primary" type="submit">Comprar</button>

         
        </div> </form>
      </div> <br>
       <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
           <strong class="nav-link active descripcion" id="d" style="cursor: pointer;">Descripción </strong>
        </li>
       <!--  <li class="nav-item">
           
            <strong class="nav-link caracteristicas" id="c" style="cursor: pointer;">Caracteristicas</strong>
        </li> -->
        
      </ul>
    </div>
    <div class="card-body" id="descripcion">
      <h5 class="card-title">Descripción</h5>
      <p class="card-text">{{$product->description}}</p>
    
    </div>
    <div class="card-body ocultar" id="caracteristicas">
      <h5 class="card-title">Caracteristicas</h5>
      <p class="card-text">Caracteristicas del producto</p>
    
    </div>
  </div> 
    </div>
  
         @endforeach
  </div>
</div>

    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Producto agregado al carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Seguir viendo productos</button>
        <a href="{{route('client.car')}}"><button type="button" class="btn btn-primary">Continuar con la compra</button></a>
      </div>
    </div>
  </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script type="text/javascript">

  
    $(".caracteristicas").click(function(){  
        $("#descripcion").addClass("ocultar"); 
         $("#d").removeClass("active"); 
         $("#c").addClass("active"); 
         $("#caracteristicas").removeClass("ocultar");   
    });  
     $(".descripcion").click(function(){  
        $("#caracteristicas").addClass("ocultar"); 
        $("#descripcion").removeClass("ocultar");
        $("#c").removeClass("active"); 
         $("#d").addClass("active");    
    });  

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
  <script type="text/javascript">
    swal("Bien", "Producto agregado al carrito", "success");
  </script>
@else
@endif
@endsection
