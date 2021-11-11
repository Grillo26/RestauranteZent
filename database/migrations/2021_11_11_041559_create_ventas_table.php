<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            
            $table->id();
            $table->string('nro_doc');
            $table->string('tipo_doc');
            $table->string('sub_totla');
            $table->string('iva');
            $table->string('propina');
            $table->string('total');
            $table->string('fecha_pedido');

            $table->unsignedBigInteger('id_pedido')->nullable();
            $table->foreign('id_pedido')
            ->references('id')->on('pedidos')
            ->onDelete('set null');

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
        Schema::dropIfExists('ventas');
    }
}
