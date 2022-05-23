@extends('layouts.app')

@section('content')
<div class="container">
    <h5>Categorias</h5><!-- Full screen modal -->

     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-secondary me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Nueva categoría</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div></form>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('category.update')}}" method="POST">
          @method('PUT')
          @csrf
            <input type="hidden" id="idedit" name="id" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control" id="nombreedit" >
   
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div></form>
    </div>
  </div>
</div>
</div>
         <!-- div de mapeo -->
            <div class="row border-bottom" style="margin-bottom: 10px;">
                 <div class="col-3"><strong>Id </strong></div>
                <div class="col-3"><strong>Categoría</strong></div>
                <div class="col-6"><strong>Opciones</strong></div>
              
            </div>
            @foreach ($categories as $category)
             <div class="row  tr" style="margin-bottom: 10px;">
                 <div class="col-3 ">{{$category->idcategory}}</div>
                <div class="col-3">{{$category->name}}</div>
                <div class="col-3"><button class="btn btn-danger eliminar">Eliminar</button> </div>
                 <div class="col-3"><button class="btn btn-primary editar">Editar</button></div>
              </div>
             @endforeach
            {{ $categories->onEachSide(5)->links() }}
       
</div>
<!-- Modal delete -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('category.destroy')}}" method="POST">
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
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <script type="text/javascript">
    //cuando el documento este listo
    $(document).ready(function(){
        //activar la funcion cuando el botonn con el la clase edit se oprima
$('.editar').on('click', function(){
    //abrir el modal con el #id
$('#exampleModal2').modal('show');

$tr = $(this).closest("div.tr");
//lavariable data es igual a lo que se mapeo en el tr y th
var data = $tr.children("div").map(function(){
    //regresa a la variable como texto
     return $(this).text();
}).get();
//imprime en consola el arreglo recabado por el mapeo en variable data que ahora es un texto
console.log(data);
//en cada id del formulario aparece le asignamos lo que aparecera segun con os datos recabados en tr de la tabala
$('#idedit').val(data[0]);
$('#nombreedit').val(data[1]);

});

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
@endsection
