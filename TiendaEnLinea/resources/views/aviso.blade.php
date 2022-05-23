@extends('layouts.myapp')

@section('content')
<div class="container">
 <center>
  <br>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Muchas gracias </div>

                <div class="card-body">
                  Gracias por seleccionar tus productos, nos contactaremos contigo en breve, para continuar con el pago de tu compra, en un horario de 8:00 am a 6:00 pm de la tarde de lunes a domingo. <br>
                  <a href="{{route('welcome')}}">Seguir comprando</a>
                </div>
            </div>
        </div>
    </div>
 </center>
 <br>
</div>
@endsection
