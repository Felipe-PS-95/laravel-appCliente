<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Telefone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class TelefoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Telefone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    
    public function cliente()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'endereco' => $this->faker->streetAddress(),
        ];
    }

    public function telefone()
    {
        return [
            'titulo' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
        ];
    }
}
