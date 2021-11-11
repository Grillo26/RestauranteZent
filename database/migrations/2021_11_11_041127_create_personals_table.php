<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_personal');
            $table->string('telefono_personal');
            $table->string('direccion_personal');
            $table->unsignedBigInteger('id_tipo')->nullable();
            $table->unsignedBigInteger('id_turno')->nullable();

            $table->foreign('id_tipo')
            ->references('id')->on('tipo_personals')
            ->onDelete('set null');

            $table->foreign('id_turno')
            ->references('id')->on('turnos')
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
        Schema::dropIfExists('personals');
    }
}
