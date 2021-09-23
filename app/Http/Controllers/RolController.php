<?php

namespace App\Http\Controllers;

use App\Http\Requests\editRolRequest;
use App\Http\Requests\rolRequest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol=Rol::all();
        return $rol;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rolRequest $request)
    {
        $rol=new Rol();
        $rol->nameRol=$request->nameRol;
        $rol->activo=$request->activo;
        $rol->save();
        //$this->index();

        return response()->json([
            'res'=>true,
            'msg'=>'agregado correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editRolRequest $request,Rol $rols)
    {
        //$rol=Rol::findorfail($id);
        $rols->update($request->all());
        return response()->json([ 
           "res"=>true,
           "msg"=>"actualizado correctamente"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rols)
    {
        $rols->delete();
        return response()->json([ 
            "res"=>true,
            "msg"=>"eliminado correctamente"
         ],200);
    }
    
}
