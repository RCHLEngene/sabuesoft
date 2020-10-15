<?php

namespace App\Http\Controllers;

use App\Clientes;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Clientes::all();
        return view('clientes', compact('data'));
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
        $data = new Clientes([
            'documento' => $request->get('documento'),
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'correo' => $request->get('correo'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'estado' => 0,
            'id_usuario' => Auth::user()->id,
        ]);

        $data->save();
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Clientes::all();
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
        $data = Clientes::find($id);
        $data->documento = $request->get('editdocumento');
        $data->nombre = $request->get('editnombre');
        $data->apellido = $request->get('editapellidos');
        $data->correo = $request->get('editcorreo');
        $data->direccion = $request->get('editdireccion');
        $data->telefono = $request->get('edittelefono');
        $data->save();
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Clientes::find($id);
        $data->delete();
        return redirect('/clientes');
    }
}
