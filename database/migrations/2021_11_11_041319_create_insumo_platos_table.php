<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumoPlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo_platos', function (Blueprint $table) {
            
            $table->id();
            
            $table->unsignedBigInteger('id_insumo')->nullable();
            $table->foreign('id_insumo')
            ->references('id')->on('insumos')
            ->onDelete('set null');

            $table->unsignedBigInteger('id_plato')->nullable();
            $table->foreign('id_plato')
            ->references('id')->on('platos')
            ->onDelete('set null');

            $table->string('cant_insumo_utilizado');

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
        Schema::dropIfExists('insumo_platos');
    }
}
