<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 30)->unique();
            $table->string('descripcion', 100);
            $table->integer('minstock');
            $table->integer('maxstock');
            $table->decimal('preciocosto', 18, 2);
            $table->decimal('precioventa', 18, 2);
            $table->decimal('porcentajeiva', 18, 2);
            $table->decimal('descuento', 18, 2);
            $table->integer('estado')->length(1)->unsigned();
            $table->foreignId('marca_id')->constrained()->onDelete('cascade');
            $table->foreignId('tipo_id')->constrained()->onDelete('cascade');
            $table->foreignId('bodega_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('provedor_id')->constrained('provedores')->onDelete('cascade');
            $table->foreignId('users_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
}
