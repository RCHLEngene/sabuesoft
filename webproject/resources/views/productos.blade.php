@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header" style="position: relative">
                        <h1 style="font-size: 20px" class="card-title">Productos</h1>

                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:10%;" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-plus-square mr-2"></i>Nuevo</button>
                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:4%;" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-minus-square mr-2"></i>Cerrar</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Descripcion</th>
                                <th>Minimo Stock</th>
                                <th>Maximo stock</th>
                                <th>Precio costo</th>
                                <th>Precio venta</th>
                                <th>Porcentaje de iva</th>
                                <th>Descuento</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Bodega</th>
                                <th>Categoria</th>
                                <th>Proveedor</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $data)
                            <tr>

                                    <td>{{$data->referencia}}</td>
                                    <td>{{$data->descripcion}}</td>
                                    <td>{{$data->minstock}}</td>
                                    <td>{{$data->maxstock}}</td>
                                    <td>{{$data->preciocosto}}</td>
                                    <td>{{$data->precioventa}}</td>
                                    <td>{{$data->porcentajeiva}}</td>
                                    <td>{{$data->descuento}}</td>
                                    <?php $vermarca = \App\Marca::find($data->marca_id); ?>
                                    <td>{{$vermarca->nombre}}</td>
                                    <?php $vertipo = \App\Tipo::find($data->tipo_id); ?>
                                    <td>{{$vertipo->nombre}}</td>
                                    <?php $verbodega = \App\Bodega::find($data->bodega_id); ?>
                                    <td>{{$verbodega->nombre}}</td>
                                    <?php $vercate = \App\Categoria::find($data->categoria_id); ?>
                                    <td>{{$vercate->nombre}}</td>
                                    <?php $verpro = \App\Provedores::find($data->provedor_id); ?>
                                    <td>{{$verpro->nombre}}</td>
                                    <td>@if($data->estado == 0)<small class="badge badge-success">Activo</small>@else($data->estado == 1)<small class="badge badge-danger">Inactivo</small>@endif</td>
                                    <td>
                                        <button onclick="editar({{$data->id}})" class="btn btn-info btn-sm">Editar</button>
                                    </td>
                                    <td>
                                        <form action="{{action('ProductoController@destroy', $data->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
            </div>
                <div class="modal fade" id="modal-lg">
                    <form method="post" action="{{url('productos')}}">
                        {{csrf_field()}}
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear producto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Referencia</label>
                                            <input type="text" class="form-control" name="referencia" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descripcion</label>
                                            <input type="text" class="form-control" name="descripcion" placeholder="" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Stock minimo</label>
                                            <input type="number" class="form-control"   name="minstock" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Stock maximo</label>
                                            <input type="number" class="form-control"   name="maxstock" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Precio costo</label>
                                            <input type="text" class="form-control" name="preciocosto" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Precio venta</label>
                                            <input type="text" class="form-control" name="precioventa" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Porcentaje iva</label>
                                            <input type="text" class="form-control" name="porcentajeiva" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descuento</label>
                                            <input type="text" class="form-control" name="descuento" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Marca</label>
                                            <select class="form-control select2" name="marca_id" style="width: 100%;" required>
                                                @foreach($marcas as $marcas)
                                                    <option value="{{$marcas->id}}">{{$marcas->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control select2" name="tipo_id" style="width: 100%;" required>
                                                @foreach($tipo as $tipo)
                                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bodega</label>
                                            <select class="form-control select2" name="bodega_id" style="width: 100%;" required>
                                                @foreach($bodega as $bodega)
                                                    <option value="{{$bodega->id}}">{{$bodega->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select class="form-control select2" name="categoria_id" style="width: 100%;" required>
                                                @foreach($categoria as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Proveedor</label>
                                            <select class="form-control select2" name="provedor_id" style="width: 100%;" required>
                                                @foreach($proveedor as $proveedor)
                                                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                    </form>
                </div>
                <div class="modal fade" id="editar">
                    <form id="form1" method="post" action="">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Producto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Referencia</label>
                                            <input type="text" class="form-control"  id="editreferencia" name="editreferencia" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descripcion</label>
                                            <input type="text" class="form-control" id="editdescripcion" name="editdescripcion" placeholder="" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Minimo stock</label>
                                            <input type="text" class="form-control"  id="editminstock" name="editminstock" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Maximo stock</label>
                                            <input type="text" class="form-control"  id="editmaxstock" name="editmaxstock" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Precio costo</label>
                                            <input type="text" class="form-control"  id="editpreciocosto" name="editpreciocosto" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Precio venta</label>
                                            <input type="text" class="form-control"  id="editprecioventa" name="editprecioventa" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Porcentaje de iva</label>
                                            <input type="text" class="form-control"  id="editpiva" name="editpiva" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descuento</label>
                                            <input type="text" class="form-control"  id="editdescuento" name="editdescuento" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label>Marca</label>
                                            <select class="form-control select2" id="editmarca" name="marca_id" style="width: 100%;" required>
                                                @foreach($editmarcas as $editmarcas)
                                                    <option value="{{$editmarcas->id}}">{{$editmarcas->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control select2" id="edittipo" name="tipo_id" style="width: 100%;" required>
                                                @foreach($edittipo as $edittipo)
                                                    <option value="{{$edittipo->id}}">{{$edittipo->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bodega</label>
                                            <select class="form-control select2" id="editbodega" name="bodega_id" style="width: 100%;" required>
                                                @foreach($editbodega as $editbodega)
                                                    <option value="{{$editbodega->id}}">{{$editbodega->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select class="form-control select2" id="editcategoria" name="categoria_id" style="width: 100%;" required>
                                                @foreach($editcategoria as $editcategoria)
                                                    <option value="{{$editcategoria->id}}">{{$editcategoria->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Proveedor</label>
                                            <select class="form-control select2" id="editproveedor" name="provedor_id" style="width: 100%;" required>
                                                @foreach($editproveedor as $editproveedor)
                                                    <option value="{{$editproveedor->id}}">{{$editproveedor->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>
                </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('js')
    <script>
        function editar(id){
            let numero = 0;
            $.get("{{url('productos')}}/"+id, function(data, status){
               console.log(data);
               var idm = data.marca_id;
               var idt = data.tipo_id;
               var idb = data.bodega_id;
               var idc = data.categoria_id;
               var idp = data.provedor_id;
                $('#editreferencia').val(data.referencia);
                $('#editdescripcion').val(data.descripcion);
                $('#editminstock').val(data.minstock);
                $('#editmaxstock').val(data.maxstock);
                $('#editpreciocosto').val(data.preciocosto);
                $('#editprecioventa').val(data.precioventa);
                $('#editpiva').val(data.porcentajeiva);
                $('#editdescuento').val(data.descuento);
               $('#editmarca').val(idm);
               $('#editmarca').change();
               $('#edittipo').val(idt);
               $('#edittipo').change();
               $('#editbodega').val(idb);
               $('#editbodega').change();
               $('#editcategoria').val(idc);
               $('#editcategoria').change();
               $('#editproveedor').val(idp);
               $('#editproveedor').change();
               //var selec = '<option id="editciudad" selected="selected" value="">'++'</option>';
               $("#form1").attr("action",'productos/'+data.id);
               //$('#ciudad').append(selec);
            });

            $('#editar').modal("show");
        }

        function eliminar(id){
            var token = {{csrf_token()}};
            $.ajax(
                {
                    url: "{{url('sucursales')}}/"+id,
                    type: 'PUT',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                        "_token": '@csrf',
                    },
                    success: function ()
                    {
                        console.log("Eliminado");
                    }
                });
        }
    </script>
@endsection
