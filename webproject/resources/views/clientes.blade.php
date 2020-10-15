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
                        <h1 style="font-size: 20px" class="card-title">Clientes</h1>

                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:10%;" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-plus-square mr-2"></i>Nuevo</button>
                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:4%;" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-minus-square mr-2"></i>Cerrar</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre Completo</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>telefono</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $data)
                            <tr>

                                    <td>{{$data->documento}}</td>
                                    <td>{{$data->nombre}}</td>
                                    <td>{{$data->correo}}</td>
                                    <td>{{$data->direccion}}</td>
                                    <td>{{$data->telefono}}</td>
                                    <td>
                                        <button onclick="editar({{$data->id}})" class="btn btn-info btn-sm">Editar</button>
                                    </td>
                                    <td>
                                        <form action="{{action('ClienteController@destroy', $data->id)}}" method="post">
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
                    <form method="post" action="{{url('clientes')}}">
                        {{csrf_field()}}
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear Cliente</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Numero de identidad</label>
                                            <input type="text" class="form-control" name="documento" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre completo</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Apellido</label>
                                            <input type="text" class="form-control" name="apellido" placeholder="" required>
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
                                            <label for="exampleInputEmail1">telefono</label>
                                            <input type="text" class="form-control"   name="telefono" placeholder="" required>
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
                                    <h4 class="modal-title">Actualizar Cliente</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Documento</label>
                                            <input type="text" class="form-control"  id="editdocumento" name="editdocumento" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombres</label>
                                            <input type="text" class="form-control"  id="editnombre" name="editnombre" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Apellidos</label>
                                            <input type="text" class="form-control"  id="editapellidos" name="editapellidos" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Correo</label>
                                            <input type="email" class="form-control" id="editcorreo" name="editcorreo" placeholder="" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Direccion</label>
                                            <input type="text" class="form-control"  id="editdireccion" name="editdireccion" placeholder="" required>
                                            <input type="hidden" id="idm">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefono</label>
                                            <input type="text" class="form-control"  id="edittelefono" name="edittelefono" placeholder="" required>
                                            <input type="hidden" id="idm">
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
            $.get("{{url('clientes')}}/"+id, function(data, status){
               console.log(data);
                $('#editdocumento').val(data[0].documento);
                $('#editnombre').val(data[0].nombre);
                $('#editapellidos').val(data[0].apellido);
                $('#editcorreo').val(data[0].correo);
                $('#editdireccion').val(data[0].direccion);
                $('#edittelefono').val(data[0].telefono);
                //var selec = '<option id="editciudad" selected="selected" value="">'++'</option>';
                $("#form1").attr("action",'clientes/'+data[0].id);
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
