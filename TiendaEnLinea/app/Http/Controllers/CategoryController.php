<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
    	$categories = category::paginate(15);

        return view('admin.categoria',['categories' => $categories]);
    }
    public function store(Request $request)
    {
    	$request->validate([
	        'name' => 'required|max:55',
	    ]);
    	$category = new category;
    	$category->name = $request->name;
    	$category->save();
    	return redirect()->route('categoria');
    }
    
     public function update(Request $request)
    {
    	$request->validate([
	        'name' => 'required|max:55',
	        'id' => 'required',
	    ]);
   		category::where('idcategory',$request->id)->update(['name' => $request->name]);
		return redirect()->route('categoria');
    	
    }
    public function destroy(Request $request)
    {
		category::where('idcategory',$request->id)->delete();
		return redirect()->route('categoria');
    	
    }
}
