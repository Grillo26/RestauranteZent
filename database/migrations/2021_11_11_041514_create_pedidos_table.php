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

            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->foreign('id_cliente')
            ->references('id')->on('clientes')
            ->onDelete('set null');

            $table->string('tipo_pedido');

            $table->unsignedBigInteger('id_mesa')->nullable();
            $table->foreign('id_mesa')
            ->references('id')->on('mesas')
            ->onDelete('set null');

            $table->unsignedBigInteger('id_personal')->nullable();
            $table->foreign('id_personal')
            ->references('id')->on('personals')
            ->onDelete('set null');

            $table->string('fecha_pedido');
            
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
