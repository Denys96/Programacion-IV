@extends('layouts.myapp')

@section('content')
<div class="container"><center>
  <h4 style="margin-top: 10px;"> Resultados encontrados</h4>
  <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-bottom: 10px; ">
     
      @if($count <= 0)
      
        <h5>No hay resultados con la palabra: {{$key}}</h5>
        <br><a href="/" class="btn btn-success">Regresar</a>
      
      @else
        @foreach ($results as $result)
      <div class="col">
        <?php  $i=0;?> 
      <div class="card">
        @foreach ($images as $image)
                   
                 @if ($result->idproduct == $image->idproduct )
                    <?php $i++;?>
                   @if($i==1)
                        <a href="{{route('client.show',$result->idproduct)}}">
                      <img src="{{asset('storage').'/'.$image->name}}" class="card-img-top" height="300">
                       </a> 
                   @endif      
                 @else  <?php  $i=0;?> 
                @endif      
                                
              @endforeach
        <div class="card-body">
         <center>
        <a href="{{route('client.show',$result->idproduct)}}" style="color: black;"><h5 class="card-title">{{$result->name}}</h5></a>
       <a href="{{route('client.show',$result->idproduct)}}"  style="color: black;"> <p class="card-text">$ {{$result->price}}. MX</p></a>
        </center>
        </div>
      </div>
    </div>
    
  @endforeach
  @endif
</div></center>
</div>

@endsection
