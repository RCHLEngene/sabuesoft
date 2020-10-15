<?php

namespace App\Http\Controllers;

use App\Bodega;
use App\Categoria;
use App\Marca;
use App\Producto;
use App\Provedor;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        $tipo = Tipo::all();
        $bodega = Bodega::all();
        $categoria = Categoria::all();
        $proveedor = DB::table('provedores')->select('*')->get();

        $editmarcas = Marca::all();
        $edittipo = Tipo::all();
        $editbodega = Bodega::all();
        $editcategoria = Categoria::all();
        $editproveedor = DB::table('provedores')->select('*')->get();

        $data = Producto::all();
        return  view('productos',compact('marcas','tipo','bodega','categoria','proveedor','editmarcas','edittipo','editbodega','editcategoria','editproveedor','data'));
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
        $data = new Producto([
            'referencia' => $request->get('referencia'),
            'descripcion' => $request->get('descripcion'),
            'minstock' => $request->get('minstock'),
            'maxstock' => $request->get('maxstock'),
            'preciocosto' => $request->get('preciocosto'),
            'precioventa' => $request->get('precioventa'),
            'porcentajeiva' => $request->get('porcentajeiva'),
            'descuento' => $request->get('descuento'),
            'estado' => '0',
            'marca_id' => $request->get('marca_id'),
            'tipo_id' => $request->get('tipo_id'),
            'bodega_id' => $request->get('bodega_id'),
            'categoria_id' => $request->get('categoria_id'),
            'provedor_id' => $request->get('provedor_id'),
            'users_id' => Auth::user()->id,
        ]);
        $data->save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Producto::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Producto::find($id);
        $data->referencia = $request->get('editreferencia');
        $data->descripcion = $request->get('editdescripcion');
        $data->minstock = $request->get('editminstock');
        $data->maxstock = $request->get('editmaxstock');
        $data->preciocosto = $request->get('editpreciocosto');
        $data->precioventa = $request->get('editprecioventa');
        $data->porcentajeiva = $request->get('editpiva');
        $data->descuento = $request->get('editdescuento');
        $data->marca_id = $request->get('marca_id');
        $data->tipo_id = $request->get('tipo_id');
        $data->bodega_id = $request->get('bodega_id');
        $data->categoria_id = $request->get('categoria_id');
        $data->provedor_id = $request->get('provedor_id');
        $data->save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Producto::find($id);
        $data->delete();
        return redirect('/productos');

    }
}
