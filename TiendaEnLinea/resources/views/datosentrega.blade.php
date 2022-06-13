@extends('layouts.myapp')

@section('content')
<div class="container">
  <br>
  Datos de entrega || Revisar orden
 <div class="progress" >
  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h5>Datos de entrega</h5>
<br>
<h5>Información del cliente y domicilio de entrega</h5>
<form class="row g-3 needs-validation" novalidate action="{{route('client.data.store')}}" method="POST">
  @csrf
  <div class="col-md-3">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01"required name="name">
    <div class="invalid-feedback">
      Campo requerido
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="validationCustom02"  required name="lastname">
     <div class="invalid-feedback">
      Campo requerido
    </div>
  </div> 
   <div class="col-md-3">
    <label for="validationCustom03" class="form-label">Telefono</label>
    <input type="text" class="form-control" id="validationCustom03" required name="phone">
    <div class="invalid-feedback">
      Introduce un numero de telefono
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustomUsername" class="form-label">Correo electrónico</label>
    <div class="input-group has-validation">
     
      <input type="email" class="form-control" id="validationCustom04" placeholder="name@example.com"
     required name="email">
      <div class="invalid-feedback">
       Introduce un correo electrónico
      </div>
    </div>
  </div> 

  <div class="col-md-3">
    <label for="validationCustom01" class="form-label">Calle</label>
    <input type="text" class="form-control" id="validationCustom05" required name="street">
    <div class="invalid-feedback">
      Campo requerido
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label">Numero exterior</label>
    <input type="number" class="form-control" id="validationCustom06" required name="ne">
     <div class="invalid-feedback">
      Campo requerido
    </div>
  </div> 
   <div class="col-md-3">
    <label for="validationCustom035" class="form-label">Numero interior</label>
    <input type="text" class="form-control" id="validationCustom07" required name="ni">
     <div class="invalid-feedback">
      Campo requerido
    </div>
  </div> 
  <div class="col-md-3">
    <label for="validationCustom037" class="form-label">Código postal</label>
    <input type="text" class="form-control" id="validationCustom089" required name="code">
  <div class="invalid-feedback">
      Campo requerido
    </div>
  </div> 
   <div class="col-md-4" style="margin-top: 10px;">
    <label for="validationCustom034" class="form-label">Colonia</label>
    <input type="text" class="form-control" id="validationCustom020" required name="colony">
  <div class="invalid-feedback">
      Campo requerido
    </div>
</div>
 <div class="col-md-4"  style="margin-top: 10px;">
   <label for="validationCustom030" class="form-label">Estado</label>
    <input type="text" class="form-control" id="validationCustom09" required name="estate">
  <div class="invalid-feedback">
      Campo requerido
    </div>
</div>
 <div class="col-md-4"  style="margin-top: 10px;">
    <label for="validationCustom0300" class="form-label">Ciudad o municipio</label>
    <input type="text" class="form-control" id="validationCustom08" required name="city">
  <div class="invalid-feedback">
      Campo requerido
    </div>
</div>
 <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Entre que calles está el domicilio</label>
    <input type="text" class="form-control" id="validationCustom12"  required name="betwen">
    <div class="invalid-feedback">
      Campo requerido
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Referencias ¿Que se encuentra cerca?</label>
    <input type="text" class="form-control" id="validationCustom13"  required name="reference">
 <div class="invalid-feedback">
      Campo requerido
    </div>
  </div> 
  <div class="col-12" style="margin-top: 20px; margin-bottom: 10px;">
    <button class="btn btn-primary" type="submit" style="width: 100%">Continuar</button>
  </div>

</form>
 <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
   <a href="{{route('client.car')}}" style="width: 100%" class="btn"> Ir al carrito</a>
  </div>
  <br>
  <?php $total=0; ?>
    @foreach (session('carrito') as $carrito)
      <?php 
    $total += $carrito['total'];
   ?>
    @endforeach
  <h5>Resumen de compra</h5><br>
  <div class="card">
  <div class="card-header">
    Resumen de compra
  </div>
  <div class="card-body">
    <h5 class="card-title">Sub total: ${{$total}}.USD</h5>
   <p class="card-text" style="color:green;">¡Envio gratis!  0</p>
   <strong>
   <p class="card-text">Total de contado: ${{$total}}.USD</p><br></strong>
   <p style="background-color: grey;">*La fecha de entrega puede cambiar por la disponibilidad del producto, tu ubicación o la forma de pago.</p>
   <strong>Entrega a domicilio</strong>
  <strong style="color:green;">Llega entre el 22 y el 27 de julio*</strong> 
  </div>
</div>
   <!--  Cards -->
  <div class="row row-cols-1 row-cols-md-3 g-4">

   @foreach (session('carrito') as $carrito)
  
  <?php $i=0; ?>
  <div class="col">
    <div class="card">
      @foreach ($images as $image)
                   
                 @if ($carrito['idproduct'] == $image->idproduct )
                    <?php $i++;?>
                   @if($i==1)
                        <a href="{{route('client.show',$carrito['idproduct'])}}">
                      <img src="{{asset('storage').'/'.$image->name}}" class="card-img-top" height="300">
                       </a> 
                   @endif      
                 @else  
                  <?php  $i=0;?> 
                @endif      
                                
              @endforeach
         <div class="card-body">
      <center>
        <a href="{{route('client.show',$carrito['idproduct'])}}" style="color: black;"><h5 class="card-title">{{$carrito['name']}}</h5></a>
       <a href="{{route('client.show',$carrito['idproduct'])}}"  style="color: black;"> <p class="card-text">$ {{$carrito['price']}}. USD</p></a>
       {{$carrito['quantity']}}
        </center>
      </div>
    </div>
    </div>
    @endforeach
  </div>
 
</div>
</div>
<script type="text/javascript">
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
@endsection
