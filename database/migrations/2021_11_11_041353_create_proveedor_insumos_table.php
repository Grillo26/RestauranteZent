<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor_insumos', function (Blueprint $table) {
            
            $table->id();

            $table->unsignedBigInteger('id_proveedor')->nullable();
            $table->foreign('id_proveedor')
            ->references('id')->on('proveedors')
            ->onDelete('set null');

            $table->unsignedBigInteger('id_insumo')->nullable();
            $table->foreign('id_insumo')
            ->references('id')->on('insumos')
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
        Schema::dropIfExists('proveedor_insumos');
    }
}
