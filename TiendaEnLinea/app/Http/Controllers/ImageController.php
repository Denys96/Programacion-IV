<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
       public function destroy(Request $request)
    {

    	Storage::delete('public/'.$request->image);
		image::where('idimage',$request->id)->delete();
		
		return redirect()->route('product.edit',$request->idproduct);
    	
    }
   
}
