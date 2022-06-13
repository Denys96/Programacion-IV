@extends('layouts.app')

@section('content')
<div class="container">
  <center>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Venta número: {{$id}}</div>
                <div class="card-body">
                @foreach ($clients as $client)
                 <p><strong>Cliente:</strong> {{$client->name}}, {{$client->lastname}}</p>
                 <p><strong>Correo:</strong> {{$client->email}}</p>
                 <p><strong>Telefono:</strong> {{$client->phone}}</p>
                 <p><strong>Dirección:</strong> Estado: {{$client->estate}}, Ciudad: {{$client->city}}, Colonia:  {{$client->colony}}, Calle: {{$client->street}}, Código postal: {{$client->postalcode}}, Número interior: {{$client->nint}}, Número exterior: {{$client->next}}, Referencias: {{$client->reference}}, Entre las calles: {{$client->betwenstreet}} </p>
                 @endforeach
                  @foreach ($sells as $sell)
                 <p><strong>Articulos comprados: </strong>{{$sell->article}} </p>
                  <p><strong>Total de la compra:</strong> ${{$sell->total}}.USD </p>
                  @endforeach
                  <a href="/home">Regresar</a>
                </div>
                
            </div>
        </div>
    </div>
  </center>
</div>
@endsection
