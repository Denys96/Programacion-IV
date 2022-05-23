@extends('layouts.app')

@section('content')
<div class="container">
    <h5>Productos</h5> <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-secondary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo producto</button>
 
</div>

        <div class="row border-bottom" style="margin-bottom: 10px;">
           <div class="col-3 d-none"><strong>ID</strong></div>
             <div class="col-3"><strong>Imagen</strong></div>
            <div class="col-3"><strong>Nombre</strong></div>
            <div class="col-6"><strong>Opciones</strong></div>
          
        </div>
        @foreach ($products as $product)
         <div class="row border-bottom tr">
           <div class="col-3 d-none">{{$product->idproduct}}</div>
            <?php  $i=0;?>
             <div class="col-3" style="margin-bottom: 10px;" >
              @foreach ($images as $image)
                   
                 @if ($product->idproduct == $image->idproduct )
                    <?php $i++;?>
                   @if($i==1)
                      <a href="{{route('product.edit',$product->idproduct)}}"><img src="{{asset('storage').'/'.$image->name}}" style="width: 100px; height:100px;"></a> 
                   @endif      
                 @else  <?php  $i=0;?> 
                @endif      
                                
              @endforeach
            </div>
            <div class="col-3"><a href="{{route('product.edit',$product->idproduct)}}">{{$product->name}}</a></div>
            <div class="col-3"><button class="btn btn-danger eliminar">Eliminar</button> </div>
             <div class="col-3"><a href="{{route('product.edit',$product->idproduct)}}"><button class="btn btn-primary">Editar</button></div></a>
          
        </div>
   @endforeach
   {{ $products->onEachSide(5)->links() }}
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
       <form enctype="multipart/form-data" action="{{route('product.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
     <!--     @method('DELETE') -->
          @csrf
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Nombre del producto</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" required>
    <div class="invalid-feedback">
       Campo requerido
      </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Código</label>
    <input type="text" class="form-control" id="validationCustom02" name="code"  required>
   <div class="invalid-feedback">
       Campo requerido
      </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Precio</label>
    <div class="input-group has-validation">
     
      <input type="number" class="form-control" name="price" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
       Campo requerido
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <label for="validationCustom03" class="form-label">Talla</label><br>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="ECH
  " name="size[]">
  <label class="form-check-label" for="inlineCheckbox1">ECH</label>
</div>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="CH" name="size[]">
  <label class="form-check-label" for="inlineCheckbox1">CH</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="M" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">M</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="G" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">G</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="EG" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">EG</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="23" name="size[]">
  <label class="form-check-label" for="inlineCheckbox1">23</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="24" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">24</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="25" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">25</label>
</div>

   <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="26" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">26</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="27" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">27</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="28" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">28</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="29" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">29</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="30" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">30</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="31" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">31</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="32" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">32</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="33" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">33</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="34" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">34</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="35" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">35</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="36" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">36</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="37" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">37</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="38" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">38</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="39" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">39</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="40" name="size[]">
  <label class="form-check-label" for="inlineCheckbox2">40</label>
</div>

  </div>

    <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Stock</label>
       <div class="input-group has-validation">
     
      <input type="number" class="form-control" id="estock" aria-describedby="inputGroupPrepend" name="stock" required>
   <div class="invalid-feedback">
       Campo requerido
      </div>
  </div>
  </div>
  <div class="col-md-3">
   <label for="inputState">Categoría</label>
      <select id="ecategory" class="form-control" name="category">
        <option value="" >Seleccionar</option>
             @foreach ($categories as $category)
         <option value="{{$category->idcategory}}" >{{$category->name}}</option>
         @endforeach
        <option value="">Seleccionar despues</option>
      </select>
 
  </div>
  <div class="col-md-3">
   <label for="inputState">Descripción </label>
      <textarea name="description" class="form-control " id="validationTextarea" required ></textarea>
 
  </div>
   
   <div class="col-md-4 here">
    <label for="exampleFormControlFile1">Imagen principal</label><input type="file" class="form-control-file btn btn-success" id="example" name="image1">

  </div>
  <div class="col-md-3">
       <div class="form-group">
        <label for="inputState">Imagen del producto</label>
   <button class="imagen btn btn-secondary" type="button">Agregar otra imagen</button>
  </div>
   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
      </div>
    </div>
  </div>
</div>

  </div>
</div>
<!-- modal delete -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('product.destroy')}}" method="POST">
          @method('DELETE')
            @csrf
            <input type="hidden" id="iddelete" name="id" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">¿Eliminar?</label>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Continuar</button>
      </div></form>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <script type="text/javascript">
    //cuando el documento este listo
    $(document).ready(function(){

$('.eliminar').on('click', function(){
    //abrir el modal con el #id
$('#exampleModal3').modal('show');

$tr = $(this).closest("div.tr");
//lavariable data es igual a lo que se mapeo en el tr y th
var data = $tr.children("div").map(function(){
    //regresa a la variable como texto
     return $(this).text();
}).get();
//imprime en consola el arreglo recabado por el mapeo en variable data que ahora es un texto
console.log(data);
//en cada id del formulario aparece le asignamos lo que aparecera segun con os datos recabados en tr de la tabala
$('#iddelete').val(data[0]);
});
    });
</script>

<script type="text/javascript">
    var data= 1;
    $('.imagen').on('click', function(){
        
        data++
            
       if (data >= 6) {
          $('.here').append('<strong>Solo puedes agregar 5 imagenes</strong><br>')
       }
       else{
         $('.here').append('<label for="exampleFormControlFile1">Imagen '+data+'</label><input type="file" class="form-control-file" id="example" name="image'+data+'">')
       }
      
    })
</script>
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
