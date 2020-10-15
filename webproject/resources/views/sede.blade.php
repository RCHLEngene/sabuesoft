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
                        <h1 style="font-size: 20px" class="card-title">Sucursales</h1>

                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:10%;" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-plus-square mr-2"></i>Nuevo</button>
                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:4%;" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-minus-square mr-2"></i>Cerrar</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre de la Sucursal</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Ciudad</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $data)
                            <tr>

                                    <td>{{$data->nombre}}</td>
                                    <td>{{$data->correo}}</td>
                                    <td>{{$data->direccion}}</td>
                                    <td>{{$data->municipio}}</td>
                                    <td>@if($data->estado == 0)<small class="badge badge-success">Activo</small>@else($data->estado == 1)<small class="badge badge-danger">Inactivo</small>@endif</td>
                                    <td>
                                        <button onclick="editar({{$data->id}})" class="btn btn-info btn-sm">Editar</button>
                                    </td>
                                    <td>
                                        <form action="{{action('SedeController@destroy', $data->id)}}" method="post">
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
                    <form method="post" action="{{url('sucursales')}}">
                        {{csrf_field()}}
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear Sucursal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre de la Sucursal</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Correo</label>
                                            <input type="email" class="form-control" name="correo" placeholder="" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Direccion</label>
                                            <input type="text" class="form-control"   name="direccion" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Ciudad</label>
                                            <select class="form-control select2" name="ciudad" style="width: 100%;" required>
                                                @foreach($ciudades as $ciudades)
                                                    <option value="{{$ciudades->id_municipio}}">{{$ciudades->municipio}}</option>
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
                                    <h4 class="modal-title">Actualizar Sucursal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre de la Sucursal</label>
                                            <input type="text" class="form-control"  id="nombre" name="editnombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Correo</label>
                                            <input type="email" class="form-control" id="correo" name="editcorreo" placeholder="" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Direccion</label>
                                            <input type="text" class="form-control"  id="direccion" name="editdireccion" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label>Ciudad</label>
                                            <select class="form-control select2" name="editciudad" id="ciudad" style="width: 100%;" required>
                                                @foreach($editciudades as $editciudades)
                                                    <option value="{{$editciudades->id_municipio}}">{{$editciudades->municipio}}</option>
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
            $.get("{{url('sucursales')}}/"+id, function(data, status){
               console.log(data);
                var idm = data[0].id_municipio;
                numero = idm;
                $('#nombre').val(data[0].nombre);
                $('#correo').val(data[0].correo);
                $('#direccion').val(data[0].direccion);
                $('#idm').val(idm);
                $('#editciudad').remove();
                $('#ciudad').val(idm);
                $('#ciudad').change();
                //var selec = '<option id="editciudad" selected="selected" value="">'++'</option>';
                console.log(idm)
                $("#form1").attr("action",'sucursales/'+data[0].id);
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
