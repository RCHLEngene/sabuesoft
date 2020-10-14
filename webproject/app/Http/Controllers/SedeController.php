<?php

namespace App\Http\Controllers;

use App\municipios;
use App\Sedes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sedes')
            ->join('municipios','municipios.id_municipio','=','ciudad')
            ->select('sedes.*','municipios.municipio')
            ->get();

        $ciudades = municipios::all();
        $editciudades = $ciudades;
        return view('sede', compact('ciudades','data','editciudades'));
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
        $data = new Sedes([
            'nombre' => $request->get('nombre'),
            'correo' => $request->get('correo'),
            'direccion' => $request->get('direccion'),
            'ciudad' => $request->get('ciudad'),
            'estado' => 0,
            'id_usuario' => Auth::user()->id,
        ]);

        $data->save();
        return redirect('/sucursales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('sedes')
            ->join('municipios','municipios.id_municipio','=','ciudad')
            ->select('sedes.*','municipios.municipio','municipios.id_municipio')
            ->where('sedes.id','=',$id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
