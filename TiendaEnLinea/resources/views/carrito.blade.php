@extends('layouts.myapp')

@section('content')
 <?php $total=0; ?>
<div class="container">
  <h3>Tu carrito</h3>
  <div class="alert alert-primary clearfix" role="alert">
   <strong>Envio gratis apartir de $499</strong>  
  </div>
   @if (empty(session('carrito')))
  <br>
    <div class="card-body">
      <h5 class="card-title">Tu carrito esta vacio</h5>
      <p class="card-text">Navega por nombre de la tienda y agrega los productos que buscas.</p>
      <a href="{{route('welcome')}}" class="btn btn-primary">Seguir comprando</a>
    </div>
    <br>
    <h5>Te recomendamos</h5>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($products as $product)
  <div class="col">
      <?php  $i=0;?> 
    <div class="card">
    @foreach ($images as $image)
                   
                 @if ($product->idproduct == $image->idproduct )
                    <?php $i++;?>
                   @if($i==1)
                        <a href="{{route('client.show',$product->idproduct)}}">
                      <img src="{{asset('storage').'/'.$image->name}}" class="card-img-top" height="300">
                       </a> 
                   @endif      
                 @else  <?php  $i=0;?> 
                @endif      
                                
      @endforeach
       <div class="card-body"> 
        <center>
        <a href="{{route('client.show',$product->idproduct)}}" style="color: black;"><h5 class="card-title">{{$product->name}}</h5></a>
       <a href="{{route('client.show',$product->idproduct)}}"  style="color: black;"> <p class="card-text">$ {{$product->price}}. MX</p></a>
        </center>
      </div>
    </div>
  </div>
 
@endforeach
</div>

 @else
  <?php 
  $carritos = session('carrito');
   ?>

  <div class="row">
    <div class="col align-self-start">
      <strong>Producto</strong>
    </div>
     <div class="col align-self-end">
       <strong>Precio unitario</strong>
    </div>
     <div class="col align-self-end">
    <strong>Cantidad</strong> 
    </div>
     <div class="col align-self-end">
      <strong>Total</strong> 
    </div>
  </div>
  @foreach ($carritos as $carrito)
  
  <?php $i=0; ?>
  <div class="row  border-top">
    <div class="col align-self-start">
         @foreach ($images as $image)
                   
                 @if ($carrito['idproduct'] == $image->idproduct )
                    <?php $i++;?>
                   @if($i==1)
                      <a href="{{route('client.show',$carrito['idproduct'])}}">
                      <img src="{{asset('storage').'/'.$image->name}}" style="width: 50px; height: 50px;">
                     </a>
                   @endif      
                 @else  <?php  $i=0;?> 
                @endif      
                                
      @endforeach 
      <br><a href="{{route('client.show',$carrito['idproduct'])}}">
   {{$carrito['name']}}</a>
   <br>
   @if(!empty($carrito['size']))
     Talla: {{$carrito['size']}} <br>
    @else
    @endif
    <form  action="{{route('client.forget')}}" method="POST">
      @csrf
      <input type="hidden" name="idproduct" value="{{$carrito['idproduct']}}">
      <input type="hidden" name="size" value="{{$carrito['size']}}"> 
      <input  type="submit" value="Eliminar">
    </form>
 
    </div>
 
     <div class="col align-self-end">
     ${{$carrito['price']}}.MX
    </div>
     <div class="col align-self-end">
   {{$carrito['quantity']}}
    <!--  <input type="number" name="cantidad" value="1" style="width: 50px;"> -->
    </div>
     <div class="col align-self-end tr" >
       ${{$carrito['total']}}.MX
    </div>
  </div>

  <?php 
    $total += $carrito['total'];
   ?>
    @endforeach
  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Compra segura</h5>
        <p class="card-text">Necesitas ayuda? llamanos 7474674674</p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card"> <center>
      <div class="card-body">
        <h5 class="card-title">Resumen de compra</h5>
        <p class="card-text">sub total:${{$total}}.MX</p>
        <p class="card-text" style="color:green;">¡Envio gratis!  0</p>
        <p class="card-text"><strong>Total de contado:  ${{$total}}.MX</strong></p>
        <a href="{{route('client.data')}}" class="btn btn-primary" style="width: 100%;">Pagar</a>
        <a href="{{url('/')}}" >Seguir comprando</a></center>
      </div>
    </div>
  </div>
</div>
</div>
@endif

@endsection
