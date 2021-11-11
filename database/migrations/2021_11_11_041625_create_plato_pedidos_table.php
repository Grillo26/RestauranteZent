<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatoPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plato_pedidos', function (Blueprint $table) {
            
            $table->id();

            $table->unsignedBigInteger('id_pedido')->nullable();
            $table->foreign('id_pedido')
            ->references('id')->on('pedidos')
            ->onDelete('set null');

            $table->unsignedBigInteger('id_plato')->nullable();
            $table->foreign('id_plato')
            ->references('id')->on('platos')
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
        Schema::dropIfExists('plato_pedidos');
    }
}
