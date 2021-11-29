<?php

namespace Database\Seeders;
use App\Models\tipo_personal;

use Illuminate\Database\Seeder;

class TipoPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admi = new tipo_personal();
        $admi->descripcion="Administrador";
        $admi->save();

        $personal = new tipo_personal();
        $personal->descripcion="Cocinero";
        $personal->save();

        $personal1 = new tipo_personal();
        $personal1->descripcion="Mesero";
        $personal1->save();

        $personal2 = new tipo_personal();
        $personal2->descripcion="Ayudante de cocina";
        $personal2->save();

        $personal3 = new tipo_personal();
        $personal3->descripcion="Cajero";
        $personal3->save();

        $personal4 = new tipo_personal();
        $personal4->descripcion="Cocinero 2";
        $personal4->save();

    }
}
