<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consecutivo')->unique();
            $table->string('refrenciaPago', 100);
            $table->integer('estado')->length(1)->unsigned();
            $table->decimal('valorpedido', 18, 2);
            $table->decimal('descuento', 18, 2);
            $table->decimal('subtotal', 18, 2);
            $table->decimal('iva', 18, 2);
            $table->decimal('total', 18, 2);

            $table->datetime('fecha_emision');
            $table->datetime('fecha_oportuna');
            $table->foreignId('mediopago_id')->constraint();
            $table->foreignId('sede_id')->constraint();
            $table->foreignId('user_id')->constraint();

            $table->datetime('fecha_pago');
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
        Schema::dropIfExists('pedidos');
    }
}
