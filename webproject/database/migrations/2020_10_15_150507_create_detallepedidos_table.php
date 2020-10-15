<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepedidos', function (Blueprint $table) {
            $table->id();
            $table->decimal('preciopedido', 18,2);
            $table->integer('cantidad');
            $table->decimal('totaliva', 18,2);
            $table->decimal('totaldescuento', 18,2);
            $table->decimal('valortotal', 18,2);
            $table->text('observacion');
            $table->integer('estado')->length(1)->unsigned();
            $table->foreignId('pedido_id')->constraint();
            $table->foreignId('producto_id')->constraint();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallepedidos');
    }
}
