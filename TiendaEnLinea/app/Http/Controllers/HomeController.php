<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sell;
use App\Models\product;
use App\Models\client;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sells = sell::get();
        return view('home',['sells' => $sells]);
    }
    public function sell(Request $request, $id){
        $sells = sell::where('idselling',$id)->get();
        foreach ($sells as  $value) {
           $idclient = $value->id_client;
        }
        $clients = client::where('idclient',$idclient)->get();
        return view('admin.ventas',['sells' => $sells,'clients' => $clients,'id' => $id]);
    }
    public function sent(Request $request){
        sell::where('idselling',$request->id)->update(['status' => 'Enviado']);
        return redirect()->route('home');
    }
    public function destroy(Request $request){
            sell::where('idselling',$request->id)->delete();
         return redirect()->route('home');
    }
    public function cancel(Request $request){
         return redirect()->route('home');
    }

}
