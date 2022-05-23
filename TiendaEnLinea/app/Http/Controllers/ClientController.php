<?php

namespace App\Http\Controllers;
use App\Models\client;
use App\Models\category;
use App\Models\image;
use App\Models\sell;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
// use App\Http\Controllers\Session;
use Session;

class ClientController extends Controller
{   
    public function notice(){
      return view('aviso');
    }
    
    public function index()
    {

       $productsasc = product::skip(0)->take(6)->get();
       $products = product::orderByRaw('created_at DESC')->take(4)->get();
       $images = image::get();
       return view('welcome',[
       	'products' => $products,
       	'images' => $images,
       	'productsasc' => $productsasc,
       ]);
    }
    public function show(Request $request)
    {
    	$products = product::where('idproduct',$request->id)->get();
      	$images = image::where('idproduct',$request->id)->get();
    	return view('productos',['products' => $products,'images' => $images]);
    }
    public function search(Request $request){
        session('carrito');
    	 $images = image::get();
    	$results = product::where('name','LIKE','%'.$request->key.'%')->get();
        $count = $results->count();
    	return view('busqueda',[
    		'images' => $images,
    		'key' => $request->key,
    		'results' => $results,
    		'count' => $count,
    	]);
    }
    public function add (Request $request){
       $total =$request->quantity * $request->price; 
      $shop = [ 'idproduct' => $request->idproduct, 
                'name' => $request->name,
                'quantity' => $request->quantity, 
                'size' => $request->size,
                'price' => $request->price,
                'total' => $total,
              ];
      if (Arr::has(session('carrito'), 'idproduct')) {
       session()->push('carrito',$shop);
      }
      else{ 
        session()->push('carrito',$shop);
      }
     session()->flash('status', 'Producto agregado al carrito');
      return redirect()->route('client.show',$request->idproduct);
    }
    public function car(){
        $products = product::orderByRaw('created_at DESC')->take(6)->get();
        $images = image::get();
      return view('carrito',['images'=>$images,'products' => $products]);
    }
    public function forget(Request $request){
     
    $n = count(session('carrito'));
     print_r(session('carrito'));
    $carritos = session('carrito');
     for ($i=0; $i < 30; $i++) { 
        if (!empty($carritos[$i])) {
            if ($carritos[$i]['idproduct']==$request->idproduct && $carritos[$i]['size']== $request->size) {
                Session::forget('carrito.'.$i);
              }    
        }     
     }

   return redirect()->route('client.car');
    }

    public function data(){
       $images = image::get();
      return view('datosentrega',['images'=>$images]);
    }

    public function datastore(Request $request){
        client::create([
          'name' => $request->name,
          'lastname' => $request->lastname,
          'phone' => $request->phone,
          'email' => $request->email,
          'street' => $request->street,
          'nint' => $request->ni,
          'next' => $request->ne,
          'postalcode' => $request->code,
          'colony' => $request->colony,
          'estate' => $request->estate,
          'city' => $request->city,
          'betwenstreet' => $request->betwen,
          'reference' => $request->reference,
        ]);
        $getcode = client::where('email',$request->email)->get();
        foreach ($getcode as  $code) {
          $idclient = $code->idclient;
        }
        $article = '';
        $total = 0;
        $newstock =0;
        foreach (session('carrito') as $value) {
          $total += $value['total'];
          $article .= "nombre:".$value['name'].", talla:".$value['size'].", cantidad:".$value['quantity'].". ";
          $products = product::where('idproduct',$value['idproduct'])->get();
              foreach ($products as  $product) {
                $stock = $product->stock;
              }
          $newstock = $stock-$value['quantity'];
            product::where('idproduct',$value['idproduct'])->update([
                          'stock' => $newstock,
                           ]);
        }
          sell::create([
            'id_client' => $idclient,
            'article' => $article,
            'total' => $total,
            'status' => 'No enviado',
          ]);
          session()->flush();
        
         return redirect()->route('client.notice');
      //registro del cliente->registro de la venta-> restar el stock de los productos en la bd->mandar el correo al usuario con los datos de su compra->
    }
}
