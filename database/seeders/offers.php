<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class offers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->truncate();

        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            DB::table('offers')->insert([
                'carname' => $faker->name,
                'carmodel' => $faker->numberBetween(1, 8),
                'bodytype' => $faker->name,
                'fueltype' => $faker->randomElement(['lpg', 'on', 'pb']),
                'course' => $faker->numberBetween(1000, 300000),
                'yearproduction' => $faker->date(),
                'vehiclestatus' => $faker->randomElement(['bezwypadkowy', 'wypadkowy', 'uszkodzony']),
                'engine' => $faker->numberBetween(1, 5),
                'drive' => $faker->randomElement(['przod', 'tył', 'na 4']),
                'country' => $faker->country,
                'id_additionalequipment' => $faker->numberBetween(1, 10),
                'steeringwheel' => $faker->randomElement(['po lewej', 'po prawej']),
                'location' => $faker->city,
                'description' => $faker->text(300),
                'price' => $faker->numberBetween(1000, 30000),
                'photos' => $faker->imageUrl(),
                'id_user' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}
