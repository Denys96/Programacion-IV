<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\product;
use App\Models\image;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$categories = category::get();
    	$products = product::paginate(15);
    	$images = image::get();
        return view('admin.productos',[
        	'products' => $products,
        	'categories' => $categories,
        	'images' => $images,
        ]);
    }
   
    public function store(Request $request)
    {
    	$request->validate([
	        'name' => 'required|max:255',
	    ]);
	    $todo = $request->all();
	 
    	 	if (empty($todo['size'])) {
    	 	 $selected ="";
    	 	}else{
		  		  if (is_array($todo['size'])){
			        $selected = '';
			        $num_pruebas = count($todo['size']);
			        $current = 0;
			        foreach ($todo['size'] as $key => $value) {
			            if ($current != $num_pruebas-1){ $selected .= $value.= ','; }
			            else{ $selected .= $value; echo $selected.'Datos a insertar en la bd'; }
			            $current++;}}
	    	
	    		  else {$selected = 'algo salio mal';}
    	}	

    		product::create([
    			'name' => $request->name,
    			'code' => $request->code,
    			'price' => $request->price,
    			'size' => $selected,
    			'description' => $request->description,
    			'stock' => $request->stock,
    			'id_category' => $request->category,
    			
    		]);
    		$getcode = product::where('code',$request->code)->get();
    		foreach ($getcode as  $code) {
    			$idproduct = $code->idproduct;

    		function insertimage($image,$idproduct){
    			image::insert([
				          	'name' => $image,
				          	'idproduct' => $idproduct,
				          ]);
    		}
					if ($request->hasFile('image1')) {
			  			  $image = $request->file('image1')->store('uploads','public');
							insertimage($image,$idproduct);	
				   }	
			  		if ($request->hasFile('image2')) {
			  			  $image = $request->file('image2')->store('uploads','public');
							insertimage($image,$idproduct);	
				   }	
				   if ($request->hasFile('image3')) {
			  			  $image = $request->file('image3')->store('uploads','public');
							insertimage($image,$idproduct);	
				   }	
				   if ($request->hasFile('image4')) {
			  			  $image = $request->file('image4')->store('uploads','public');
							insertimage($image,$idproduct);	
				   }	
				   if ($request->hasFile('image5')) {
			  			  $image = $request->file('image5')->store('uploads','public');
							insertimage($image,$idproduct);	
				   }	
    		}
    		
			 return redirect()->route('producto');
    	
    } 
    public function edit(Request $request, $id){
    	$products = product::where('idproduct',$id)->get();
    	$images = image::where('idproduct',$id)->get();
    	$categories = category::get();
    
    	return view('admin.editproduct',[
    		'products' => $products,
    		'images' => $images,
    		'categories' => $categories,
    		
    	]);
    }
    public function update(Request $request)
    {
    	$request->validate([
	        'name' => 'required|max:255',
	    ]);
	      $todo = $request->all();
	    if (empty($todo['size'])) 
	    	{ $selected = $request->sizes; }
	    else{
	  		  if (is_array($todo['size'])){
		        $selected = '';
		        $num_pruebas = count($todo['size']);
		        $current = 0;
		        foreach ($todo['size'] as $key => $value) {
		            if ($current != $num_pruebas-1){ $selected .= $value.= ','; }
		            else{ $selected .= $value; echo $selected.'Datos a insertar en la bd'; }
		            $current++;}}
    	else {$selected = 'algo salio mal';}}	

   		product::where('idproduct',$request->id)->update([
   				'name' => $request->name,
    			'code' => $request->code,
    			'price' => $request->price,
    			'size' => $selected,
    			'description' => $request->description,
    			'stock' => $request->stock,
    			'id_category' => $request->category,
   		]);

   		function insertimage($image,$idproduct){
    			image::insert([
				          	'name' => $image,
				          	'idproduct' => $idproduct,
				          ]);
    		}

			  		if ($request->hasFile('image2')) {
			  			  $image = $request->file('image2')->store('uploads','public');
							insertimage($image,$request->id);	
				   }	
				   if ($request->hasFile('image3')) {
			  			  $image = $request->file('image3')->store('uploads','public');
							insertimage($image,$request->id);	
				   }	
				   if ($request->hasFile('image4')) {
			  			  $image = $request->file('image4')->store('uploads','public');
							insertimage($image,$request->id);	
				   }	
				   if ($request->hasFile('image5')) {
			  			  $image = $request->file('image5')->store('uploads','public');
							insertimage($image,$request->id);	
				   }	
		return redirect()->route('product.edit',$request->id);
    	
    }
    public function destroy(Request $request)
    {
    	 $images = image::where('idproduct',$request->id)->get();
    	foreach ($images as  $image) {
			Storage::delete('public/'.$image->name);
    	}
		product::where('idproduct',$request->id)->delete();
		return redirect()->route('producto');
    	
    }
}
