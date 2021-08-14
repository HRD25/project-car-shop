<?php

namespace Database\Seeders;

use Carbon\Carbon;
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

        DB::table('countrys')->truncate();
        DB::table('equipments')->truncate();
        DB::table('offers')->truncate();
        DB::table('bodytypes')->truncate();
        DB::table('viewhome')->truncate();

        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('viewhome')->insert([
                'photo' => $faker->imageUrl(),
            ]);
        }

        for ($i = 0; $i < 30; $i++) {
            DB::table('countrys')->insert([
                'name' => $faker->country
            ]);
        }

        for ($i = 0; $i < 4; $i++) {
            DB::table('bodytypes')->insert([
                'name' => $faker->randomElement(['sedan', 'coupe', 'kombi', 'Suv'])
            ]);
        }

        for ($i = 0; $i < 8; $i++) {
            DB::table('equipments')->insert([
                'name' => $faker->randomElement(['elektryczne-szyby', 'podgrzewane-siedzenie', 'poduszka-powietrzna', 'kamera-parkowania-tyl', 'skora', 'automatyczny-pilot', 'ABS', 'Controla trakcji pojazdu'])
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('offers')->insert([
                'carname' => $faker->name,
                'id_carmodel' => $faker->numberBetween(1, 8),
                'id_bodytype' => $faker->numberBetween(0, 4),
                'fueltype' => $faker->randomElement(['Paliwo+lpg', 'Diesel', 'Paliwo']),
                'course' => $faker->numberBetween(1000, 300000),
                'yearproduction' => $faker->date(),
                'vehiclestatus' => $faker->randomElement(['bezwypadkowy', 'wypadkowy', 'uszkodzony']),
                'id_engine' => $faker->numberBetween(1, 5),
                'drive' => $faker->randomElement(['przod', 'tył', 'na 4']),
                'id_country' => $faker->numberBetween(0, 30),
                'id_additionalequipment' => $faker->numberBetween(0, 8),
                'steeringwheel' => $faker->randomElement(['po lewej', 'po prawej']),
                'location' => $faker->city,
                'description' => $faker->text(300),
                'price' => $faker->numberBetween(1000, 30000),
                'photo' => $faker->imageUrl(),
                'id_user' => $faker->numberBetween(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
