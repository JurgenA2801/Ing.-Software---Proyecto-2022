<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservacion>
 */
class ReservacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fechaInicio' => $this->faker->dateTime(), 
            'fechaCierre' => $this->faker->dateTime(), 
            'horaCierre' => $this->faker->time(), 
            'estadoServicio' => $this->faker->word(), 
            'numeroVuelo' => $this->faker->randomDigit(), 
            'cantidadPasajeros' => $this->faker->randomDigit(),
            'tarifa'=> $this->faker->numberBetween(5000, 10000),
            'observaciones'=> $this->faker->sentence()

        ];
    }
}
