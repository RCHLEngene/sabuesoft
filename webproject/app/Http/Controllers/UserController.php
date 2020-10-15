<?php

namespace App\Http\Controllers;

use App\roles;
use App\Sedes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = roles::all();
        $sedes = Sedes::all();
        $editrol = roles::all();
        $data = DB::table('users')
            ->join('roles','roles.id','=','users.rol')
            ->select('users.*','roles.nombre')
            ->get();

        return view('user', compact('rol','data','editrol','sedes'));
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
        $data = new User([
            'name' => $request->get('nombre'),
            'email' => $request->get('correo'),
            'password' => Hash::make($request->get('password')),
            'rol' => $request->get('rol'),
            'sede' => $request->get('sede'),
        ]);

        $data->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('users')
            ->join('roles','roles.id','=','users.rol')
            ->select('users.*','roles.nombre','roles.id as idr')
            ->where('users.id','=',$id)
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
