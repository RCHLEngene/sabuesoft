<?php

namespace App\Http\Controllers;

use App\Bodega;
use App\municipios;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::all();
        $edituser = \App\User::all();
        $ciudades = municipios::all();
        $editciudades = $ciudades;
        $data = DB::table('bodegas')
            ->join('municipios','municipios.id_municipio','=','bodegas.ciudad')
            ->join('users','users.id','=','bodegas.responsable')
            ->select('bodegas.*','municipios.*','users.*','bodegas.id as bid','bodegas.estado as bestado')
            ->get();
        return view('bodega', compact('user','ciudades','data','editciudades','edituser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Bodega([
            'nombre' => $request->get('nombre'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'responsable' => $request->get('responsable'),
            'correo' => $request->get('correo'),
            'ciudad' => $request->get('ciudad'),
            'estado' => 0,
            'id_usuario' => Auth::user()->id,
        ]);

        $data->save();
        return redirect('/bodega');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('bodegas')
            ->join('municipios','municipios.id_municipio','=','bodegas.ciudad')
            ->join('users','users.id','=','bodegas.responsable')
            ->select('bodegas.*','municipios.*','users.*','bodegas.id as bid','bodegas.estado as bestado')
            ->where('bodegas.id','=',$id)
            ->get();



        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $data = Bodega::find($id);
        $data->nombre = $request->get('editnombre');
        $data->direccion = $request->get('editdireccion');
        $data->telefono = $request->get('edittelefono');
        $data->responsable = $request->get('editresponsable');
        $data->correo = $request->get('editcorreo');
        $data->ciudad = $request->get('editciudad');
        $data->save();
        return redirect('/bodega');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Bodega::find($id);
        $data->delete();
        return redirect('/bodega');
    }
}
