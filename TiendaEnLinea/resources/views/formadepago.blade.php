@extends('layouts.myapp')

@section('content')<br>
<div class="container">
  <div class="row">
  <div class="col">
    
  
<h5>Formas de pago</h5>
<div class="form-check">
  <input class="form-check-input deposito" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
  <label class="form-check-label" >
    Deposito
  </label>
</div>
<div class="form-check">
  <input class="form-check-input transferencia" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
  <label class="form-check-label" >
    Transferencia bancaria
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" disabled>
  <label class="form-check-label" >
    Paypal Proximamente
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" disabled >
  <label class="form-check-label">
   Tarjeta de debito o credito Proximamente
  </label>
</div>
</div>
 <div class="col " id="deposito" >
    <p>Datos para depositar</p>
    <p>Numero de cuenta o tarjeta</p>

  </div>
  <div class="col ocultar" id="transferencia">
    <p>Datos para transferir</p>
   
  </div>
</div>
<h5 class="border-top">¿Ya pagaste?</h5>
  <p>Escribe tu correo electrónico y enseguida nos comunicaremos contigo para corroborar la información</p>
  <div class="alert alert-success" role="alert">
  Se a enviado un mensaje a tu correo electrónico
</div>
<form class="row g-3 border-top">

  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Escribe tu correo</label>
    <input type="email" class="form-control" id="inputPassword2" placeholder="Correo">
  </div>
  <div class="col-auto">
    <button style="margin-top: 30px;" type="submit" class="btn btn-success mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
</svg>Ya pague</button>
  </div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script type="text/javascript">

  
    $(".deposito").click(function(){  
        $("#transferencia").addClass("ocultar");  
         $("#deposito").removeClass("ocultar");   
    });  
     $(".transferencia").click(function(){  
        $("#deposito").addClass("ocultar"); 
        $("#transferencia").removeClass("ocultar");   
    });  

</script>
@endsection
