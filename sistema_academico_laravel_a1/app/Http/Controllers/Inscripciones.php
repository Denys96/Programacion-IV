<?php

namespace App\Http\Controllers;

use App\Models\inscripcion;
use Illuminate\Http\Request;

class Inscripciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inscripcion::get();//select * from inscripcion
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Inscripcion::create($request->all())->id;//insert into inscripcion...
        return response()->json(['id'=>$id], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(inscripcion $inscripcion)
    {
        return $inscripcion;//select * from inscripcion where id = $id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inscripcion $inscripcion)
    {
        $inscripcion->update($request->all());//update inscripcion set ... where id = $id
        return response()->json(['id'=>$request->id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(inscripcion $inscripcion)
    {
        $inscripcion->delete();//delete from inscripcion where id = $id
        return response()->json(['id'=>$inscripcion->id], 200);
    }
}
