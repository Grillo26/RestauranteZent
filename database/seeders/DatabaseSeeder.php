<?php

namespace Database\Seeders;

use App\Models\cliente;
use App\Models\insumo;
use App\Models\personal;
use App\Models\proveedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(TurnoSeeder::class);
        $this->call(TipoPersonalSeeder::class);

        //Otra forma de llamar a los factories
        cliente::factory(300)->create();
        personal::factory(32)->create();
        proveedor::factory(50)->create();
        insumo::factory(400)->create();
    }
}
