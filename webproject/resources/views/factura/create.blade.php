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
                        <h1 style="font-size: 20px" class="card-title">Nueva Factura</h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{url('clientes')}}">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="form-group col-md-2 col-xs-12">
                                <label for="consecutivo">Número de factura</label>
                                <input type="text" class="form-control " name="consecutivo" id="consecutivo">
                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                <label for="fecha_pago">Fecha de emisión</label>
                                <input type="text" class="form-control " name="fecha_emision" id="fecha_emision">
                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                <label for="fecha_pago">Fecha del pago</label>
                                <input type="text" class="form-control " data-date-format="dd/mm/yyyy" name="fecha_pago" id="fecha_oportuna">
                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                <label for="fecha_pago">Fecha Vencimiento</label>
                                <input type="text" class="form-control " name="fecha_oportuna" id="fecha_pago">
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="referenciaPago">Referencia de pago</label>
                                <input type="text" class="form-control " name="referenciaPago" id="referenciaPago">
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="fecha_pago">Medio de pago</label>

                                <select class="form-control select2 " aria-hidden="true" name="mediopago_id"  required>
                                    @foreach($mediospago as $mediopago)
                                        <option value="{{$mediopago->id}}">{{$mediopago->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-12">
                                <h5>Datos del cliente</h4>
                                <hr>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label for="consecutivo">Documento</label>
                                <input type="text" class="form-control " name="documento" id="documento">
                            </div>

                            <div class="col-md-8">
                            <label for="basic-url">Nombre</label>
                            <div class="input-group">
                                  <input class="form-control py-2" type="search" value="Nombre" id="nombreCliente" name="nombreCliente">
                                  <span class="input-group-append">
                                    <button class="btn btn-outline-secondary" id="buscarCliente" type="button">
                                        <i class="fa fa-search"></i>
                                     </button>
                                  </span>
                            </div>
                            </div>



                        </div>
                        <div class="row">

                            <div class="col-md-2"></div>
                            <div class="form-group col-md-2 col-xs-12">
                                <label for="valorpedido">Valor $</label>
                                <input type="text" class="form-control " name="valorpedido" id="valorpedido">
                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                <label for="Descuento">Descuento $</label>
                                <input type="text" class="form-control " name="Descuento" id="Descuento">
                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                <label for="subtotal">Subtotal $</label>
                                <input type="text" class="form-control " name="subtotal" id="subtotal">
                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                <label for="iva">IVA $</label>
                                <input type="text" class="form-control " name="iva" id="iva">
                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                <label for="total">Total Factura $</label>
                                <input type="text" class="form-control " name="total" id="total">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="" class="btn btn-danger float-right">
                                    <i class="fa fa-window-close"></i>
                                    Cancelar
                                </a>
                                <a href="" class="btn btn-primary float-right mr-2">
                                    <i class="fa fa-file"></i>
                                    Generar Factura
                                </a>
                            </div>
                        </div>



                        </form>
                    </div>
                    <!-- /.card-body -->
            </div>
                <div class="modal fade" id="modal-lg">
                    <form method="post" action="{{url('clientes')}}">
                        {{csrf_field()}}
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Clientess</h4>
                                <button type="button" class="close" factura-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="card-body">

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" factura-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                    </form>
                </div>
                <div class="modal fade" id="clientes">
                    <form id="form1" method="post" action="">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Clientes</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo</th>
                                                <th>Dirección</th>
                                                <th>telefono</th>
                                                <th>Seleccionar</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($clientes as $data)
                                            <tr>

                                                    <td>{{$data->documento}}</td>
                                                    <td>{{$data->nombre}}</td>
                                                    <td>{{$data->correo}}</td>
                                                    <td>{{$data->direccion}}</td>
                                                    <td>{{$data->telefono}}</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm select_btn" data-dismiss="modal">Seleccionar</button>
                                                    </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer justify-content-between">

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script>

        $(document).ready(function() {
            var fullDate = new Date()

            //Thu May 19 2011 17:25:38 GMT+1000 {}

            //convert month to 2 digits
            var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : (fullDate.getMonth()+1);

            var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
            console.log(currentDate);

            $('#fecha_emision').val(currentDate);

            // fecha de pago
            $('#fecha_pago').datepicker({
                weekStart: 1,
                daysOfWeekHighlighted: "6,0",
                autoclose: true,
                todayHighlight: true,
            });
            $('#fecha_pago').datepicker("setDate", new Date());

            // fecha de emision
            $('#fecha_oportuna').datepicker({
                weekStart: 1,
                daysOfWeekHighlighted: "6,0",
                autoclose: true,
                todayHighlight: true,
            });
            $('#fecha_oportuna').datepicker("setDate", new Date());
        });

        $("#buscarCliente").click(function() {
            $('#clientes').modal("show");
        });

        $("#example1").on('click', 'tbody .select_btn', function (e) {
            e.preventDefault();
            var table = $('#example1').DataTable();
            var data_row = table.row($(this).closest('tr')).data();

            $("#documento").val(data_row[0]);
            $("#nombreCliente").val(data_row[1]);
        })



        function editar(id){
            let numero = 0;
            $.get("{{url('clientes')}}/"+id, function(factura, status){
               console.log(factura);
                $('#editdocumento').val(factura[0].documento);
                $('#editnombre').val(factura[0].nombre);
                $('#editapellidos').val(factura[0].apellido);
                $('#editcorreo').val(factura[0].correo);
                $('#editdireccion').val(factura[0].direccion);
                $('#edittelefono').val(factura[0].telefono);
                //var selec = '<option id="editciudad" selected="selected" value="">'++'</option>';
                $("#form1").attr("action",'clientes/'+factura[0].id);
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
                    facturaType: "JSON",
                    factura: {
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
