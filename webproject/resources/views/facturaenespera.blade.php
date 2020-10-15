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
                        <h1 style="font-size: 25px" class="card-title">Facturas En Espera</h1>

                        <button class="btn btn-primary" style="position: absolute;bottom: 3px; right:4%;" >
                        <i class="fa fa-home mr-2"></i><a href='home' style='text-decoration:none; color:white;'>Regresar al inicio</a></button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>precio de venta</th>
                                <th>producto</th>
                    
                                <th>cantidad</th>
                                <th>total de iva</th>
                                <th>total de descuentos</th>
                                <th>valor total</th>
                                <th>observacion </th>
                                <th>estado</th>




                            </tr>
                            </thead>
                            <tbody>
                          
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
            </div>

               
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('js')
@endsection
