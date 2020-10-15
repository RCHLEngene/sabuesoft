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
                        <h1 style="font-size: 20px" class="card-title">Bodega</h1>

                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:10%;" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-plus-square mr-2"></i>Nuevo</button>
                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:4%;" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-minus-square mr-2"></i>Cerrar</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre de la Bodega</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Responsable</th>
                                <th>Correo</th>
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
                                    <td>{{$data->direccion}}</td>
                                    <td>{{$data->telefono}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->correo}}</td>
                                    <td>{{$data->municipio}}</td>
                                    <td>@if($data->bestado == '0')<small class="badge badge-success">Activo</small>@else($data->estado == 1)<small class="badge badge-danger">Inactivo</small>@endif</td>
                                    <td>
                                        <button onclick="editar({{$data->bid}})" class="btn btn-info btn-sm">Editar</button>
                                    </td>
                                    <td>
                                        <form action="{{action('BodegaController@destroy', $data->bid)}}" method="post">
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
                    <form method="post" action="{{url('bodega')}}">
                        {{csrf_field()}}
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear bodega</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre de bodega</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Direccion</label>
                                            <input type="text" class="form-control"   name="direccion" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefono</label>
                                            <input type="text" class="form-control"   name="telefono" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Responsable</label>
                                            <select class="form-control select2" name="responsable" style="width: 100%;" required>
                                                @foreach($user as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Correo</label>
                                            <input type="email" class="form-control" name="correo" placeholder="" required>
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
                                    <h4 class="modal-title">Actualizar Bodega</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre de la Bodega</label>
                                            <input type="text" class="form-control"  id="editnombre" name="editnombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Direccion</label>
                                            <input type="text" class="form-control" id="editdireccion" name="editdireccion" placeholder="" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefono</label>
                                            <input type="text" class="form-control"  id="edittelefono" name="edittelefono" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label>Responsable</label>
                                            <select class="form-control select2" name="editresponsable" id="editresponsable" style="width: 100%;" required>
                                                @foreach($edituser as $edituser)
                                                    <option value="{{$edituser->id}}">{{$edituser->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Correo</label>
                                            <input type="text" class="form-control"  id="editcorreo" name="editcorreo" placeholder="" required>
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
            let numero2 = 0;
            $.get("{{url('bodega')}}/"+id, function(data, status){
               console.log(data);
                var bid = data[0].id_municipio;
                var rid = data[0].responsable;
                numero = bid;
                numero2 = rid;
                $('#editnombre').val(data[0].nombre);
                $('#editdireccion').val(data[0].direccion);
                $('#edittelefono').val(data[0].telefono);
                $('#editcorreo').val(data[0].correo);
                $('#editciudad').remove();
                $('#editresponsable').val(rid);
                $('#editresponsable').change();
                $('#ciudad').val(bid);
                $('#ciudad').change();
                //var selec = '<option id="editciudad" selected="selected" value="">'++'</option>';
                console.log(bid)
                $("#form1").attr("action",'bodega/'+id);
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
