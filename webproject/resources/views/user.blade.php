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
                        <h1 style="font-size: 20px" class="card-title">Usuarios</h1>

                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:10%;" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-plus-square mr-2"></i>Nuevo</button>
                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:4%;" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-minus-square mr-2"></i>Cerrar</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre del usuario</th>
                                <th>Correo</th>
                                <th>rol</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $data)
                            <tr>

                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td><small class="badge badge-success">{{$data->nombre}}</small></td>
                                    <td>
                                        <button onclick="editar({{$data->id}})" class="btn btn-info btn-sm">Editar</button>
                                    </td>
                                    <td>
                                        <form action="{{action('UserController@destroy', $data->id)}}" method="post">
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
                    <form method="post" action="{{url('users')}}">
                        {{csrf_field()}}
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear usuario</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre del usuario</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Correo</label>
                                            <input type="email" class="form-control" name="correo" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Contraseña</label>
                                            <input type="password" class="form-control" name="password" placeholder="" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Rol</label>
                                            <select id="rol" class="form-control select2" name="rol" style="width: 100%;" required>
                                                @foreach($rol as $rol)
                                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" style="display: none" id="sede">
                                            <label>Sucursal</label>
                                            <select class="form-control select2" name="sede"  style="width: 100%;" required>
                                                @foreach($sedes as $sedes)
                                                    <option value="{{$sedes->id}}">{{$sedes->nombre}}</option>
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
                                    <h4 class="modal-title">Crear Sucursal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre del Usuario</label>
                                            <input type="text" class="form-control"  id="nombre" name="editnombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Correo</label>
                                            <input type="email" class="form-control" id="correo" name="editcorreo" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Rol</label>
                                            <select class="form-control select2" name="editciudad" id="ciudad" style="width: 100%;" required>
                                                @foreach($editrol as $editrol)
                                                    <option value="{{$editrol->id}}">{{$editrol->nombre}}</option>
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
        $('#rol').change(function() {
            var state = $('#rol').val();
            if (state != 1){
                $('#sede').removeAttr('style')
                console.log(state);

            }else{
                $('#sede').css({display: 'none'});
                console.log(state);
            }
        });

        function editar(id){
            let numero = 0;
            $.get("{{url('users')}}/"+id, function(data, status){
                console.log(data);
               /* var idm = data[0].id_municipio;
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
                //$('#ciudad').append(selec);*/
            });

            $('#editar').modal("show");
        }
    </script>
@endsection
