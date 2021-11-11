<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_personal' => $this-> faker->company(),
            'telefono_personal' => $this-> faker->phoneNumber(),
            'direccion_personal' => $this-> faker->streetAddress(),
            'id_tipo' => rand(1,4),
            'id_turno' => rand(1,3),
            'created_at' => $this-> faker->dateTime,
            'updated_at' => $this-> faker->dateTime,
        ];
    }
}
