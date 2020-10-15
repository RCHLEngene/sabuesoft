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
                        <h1 style="font-size: 25px" class="card-title">Nueva venta</h1><br>
                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:4%;" >
                        <i class="fa fa-home mr-2"></i><a href='home' style='text-decoration:none; color:white;'>Regresar al inicio</a></button>
                    </div>
                    <div class="card-header" style="position: relative">

                      <div class='cliente' align='left'>
                        <h2 style="font-size: 20px" class="card-title">Datos del cliente</h2><br>
                        <tr>
                            <td>
                            <input type="text" placeholder='C&eacute;dula' id='cedulacliente'>
                            <input type="text" placeholder='Nombre' id='nombrecliente'>

                            <button  style="background:none; border:none;" data-toggle="modal" data-target="#modal-xl"><i class='fa fa-search'></i></button>
                            </td>
                        </tr>
                      </div>
                      <!---Modal para la busqueda--->
                      <div class="modal fade" id="modal-xl" >
                    <form method="post" action="" >
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">B&uacute;squeda de productos</h4><hr>
                               
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!------cuerpo modal---> 
                                <h5 class="modal-tittle">Criterios de b&uacute;squedas</h5>
                                <div class="card-body">
                                   <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>C&oacute;digo</th>
                                <th>Marca</th>
                                <th>cartegoria</th>
                                <th>Producto</th>
                                <th>unidad</th>
                                <th>Valor venta</th>
                                <th>Stock</th>
                                <th>Descuento</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                                    <!--fin cuerpo modal-->
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

                      <div class='producto' style='margin-left:50%; margin-top:-54px;'>
                        <h2 style="font-size: 20px" class="card-title">Producto</h2>
                        <br>
                        <tr>
                            <td>
                            <input type="text" placeholder='C&oacute;digo' id='codigoproducto'>
                            <input type="text" placeholder='Nombre' id='nombreproducto'>
                            </td>
                        </tr>
                     </div>
                    </div>
                    <div class="card-header" style="position: relative">
                        <h2 style="font-size: 20px" class="card-title">Detalles de venta</h2>
                        <h3 style="font-size: 17px; float:right;" >Fecha: <?php $time=time(); echo date("d/m/y",$time);?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>C&oacute;digo</th>
                                <th>Producto</th>
                                <th>Unidad</th>
                                <th>Valor Unitario</th>
                                <th>Cantidad</th>
                                <th>Valor Total</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                            <tr>
                            
                            <td colspan='2' style='padding-left:100px;'>
                            <button class="btn btn-success" style="bottom: 3px; right:4%;" ><i class="fa fa-print mr-2"></i><a href='#' style='text-decoration:none; color:white;'>Generar factura</a></button>
                            <button class="btn btn-danger" style="bottom: 3px; right:4%;" ><i class="fa fa-trash mr-2"></i><a href='#' style='text-decoration:none; color:white;'>Cancelar factura</a></button></td>

                            <td ><b>Total:</b> $134.000.00</td>
                            <td><b>Descuento:</b> $34.000.00</td>
                            <td><b>SubTotal:</b> $34.000.000</td>
                            <td><b>Valor Iva:</b> $63.000.000</td>
                            <td><b>Total:</b> $154.000.00</td>
                            </tr>
                        </table>
                    <!-- /.card-body -->
            </div>

               
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('js')
@endsection
