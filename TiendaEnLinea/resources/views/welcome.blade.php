@extends('layouts.myapp')

@section('content')
<div class="container">
	
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://th.bing.com/th/id/R.f474aa05f2e4b26ddf2354744280dadf?rik=yCjf8c6zYf251w&pid=ImgRaw" class="d-block w-100"  height="500">
    </div>
    <div class="carousel-item">
      <img src="https://th.bing.com/th/id/R.827ba5272e2acf051a9034aec5e5ec18?rik=B%2fimRe0UYAlDvA&pid=ImgRaw" class="d-block w-100"  height="500">
    </div>
    <div class="carousel-item">
      <img src="https://th.bing.com/th/id/OIP.hD6fJHrnRRdmms-RsegmiAHaEK?pid=ImgDet&rs=1" class="d-block w-100"  height="500">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </button>
</div>

<br>

<br>
<h3>Recomendaciones</h3>
<div class="row row-cols-1 row-cols-md-2 g-4">
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
<h3>Lo mas vendido</h3>
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($productsasc as $asc)
  <div class="col">
    <div class="card">
      @foreach ($images as $image)
                   
                 @if ($asc->idproduct == $image->idproduct )
                    <?php $i++;?>
                   @if($i==1)
                        <a href="{{route('client.show',$asc->idproduct)}}">
                      <img src="{{asset('storage').'/'.$image->name}}" class="card-img-top" height="300">
                       </a> 
                   @endif      
                 @else  <?php  $i=0;?> 
                @endif      
                                
              @endforeach
      <div class="card-body">
      <center>
        <a href="{{route('client.show',$product->idproduct)}}" style="color: black;"><h5 class="card-title">{{$asc->name}}</h5></a>
       <a href="{{route('client.show',$product->idproduct)}}"  style="color: black;"> <p class="card-text">$ {{$asc->price}}. MX</p></a>
        </center>
      </div>
    </div>
  </div>
  @endforeach
  

</div>
</div>
@endsection
