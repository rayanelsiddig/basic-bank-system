<?php

namespace Database\Seeders;

use App\Models\customer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
	    	customer::create([
                'id' => $faker->uuid() ,
	            'name' => $faker->name(),
                'phone' => $faker->phoneNumber() ,
                'address' => $faker->address(),
	            'email' => $faker->email(),
                'current_balance'=> $faker->numberBetween( 1000,  9000)
	        ]);
    	}
    }
}
