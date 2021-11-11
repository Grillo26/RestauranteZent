<?php

namespace Database\Seeders;
use App\Models\turno;
use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turno = new turno();
        $turno->descripcion="Mañana";
        $turno->save();

        $turno1 = new turno();
        $turno1->descripcion="Tarde";
        $turno1->save();

        $turno2 = new turno();
        $turno2->descripcion="Noche";
        $turno2->save();
    }
}
