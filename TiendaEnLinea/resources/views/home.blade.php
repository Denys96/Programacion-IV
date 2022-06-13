@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ventas</div>

                <div class="card-body">
                     <div class="row">
                         <div class="col">Número</div>
                         <div class="col">Total</div>
                         <div class="col">Estado</div>
                         <div class="col">Opciones</div>
                     
                        <div class="col"></div>
                     </div>
                     @foreach ($sells as $sell)
                      <div class="row">
                         <div class="col"><a href="{{route('home.sell',$sell->idselling)}}">{{$sell->idselling}}</a></div>
                         <div class="col"><a href="{{route('home.sell',$sell->idselling)}}">${{$sell->total}}</a></div>
                         @if($sell->status == "")
                            <div class="col"> <a href="{{route('home.sell',$sell->idselling)}}">No enviado</a></div>
                         @else 
                            <div class="col"><a href="{{route('home.sell',$sell->idselling)}}">{{$sell->status}}</a></div>
                         @endif
                         
                         <div class="col">
                            <form action="{{route('home.sent')}}" method="POST">
                                @csrf
                                @method('PUT')
                                    <input type="hidden" name="id" value="{{$sell->idselling}}">
                                  
                                <button class="btn btn-success">Enviado</button>
                            </form>
                         </div>
                           <div class="col">
                            <form action="{{route('home.cancel')}}" method="POST">
                                @csrf
                                @method('PUT')
                                    <input type="hidden" name="id" value="{{$sell->idselling}}">
                               
                                <button class="btn btn-warning">Cancelar</button>
                            </form>
                         </div> 
                          <div class="col">
                            <form action="{{route('home.destroy')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="hidden" name="id" value="{{$sell->idselling}}">
                                  
                                <button class="btn btn-danger">Elimiar</button>
                            </form>
                         </div>
                        
                        
                     </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
