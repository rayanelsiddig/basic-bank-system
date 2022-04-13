<?php

namespace Database\Factories;

use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class customerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = customer::class;
    public function definition()
    {
        return [
            'id' => $this->faker->uuid() ,
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->unique()->phoneNumber() ,
           
            
            'current_balance'=> $this->faker->numberBetween( 1000,  90000)
        ];
    }
}
