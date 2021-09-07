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
        DB::table('carmodels')->truncate();
        DB::table('fueltypes')->truncate();
        DB::table('vehiclestatus')->truncate();
        DB::table('engines')->truncate();
        DB::table('steeringwheels')->truncate();
        DB::table('drives')->truncate();
        DB::table('messages')->truncate();

        $faker = Factory::create();

        // for ($i = 0; $i < 30; $i++) {
        //     $idToUser = $faker->numberBetween(1, 4);
        //     $idFromUser = $faker->numberBetween(1, 4);

        //     if ($idToUser != $idFromUser) {
        //         DB::table('messages')->insert([
        //             'id_offer' => $faker->numberBetween(1, 30),
        //             'idToUser' => $idToUser,
        //             'idFromUser' => $idFromUser,
        //             'messages' => $faker->text,
        //             'is_read' => $faker->numberBetween(0, 1)
        //         ]);
        //     }
        // }

        for ($i = 0; $i < 3; $i++) {
            DB::table('drives')->insert([
                'name' => $faker->randomElement(['przod', 'tył', 'quatro'])
            ]);
        }

        for ($i = 0; $i < 2; $i++) {
            DB::table('steeringwheels')->insert([
                'name' => $faker->randomElement(['po lewej', 'po prawej'])
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            DB::table('engines')->insert([
                'name' => $faker->randomElement(['1.0', '2.0', '3.0', '4.0', '5.0'])
            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            DB::table('vehiclestatus')->insert([
                'name' => $faker->randomElement(['bezwypadkowy', 'wypadkowy', 'uszkodzony'])
            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            DB::table('fueltypes')->insert([
                'name' => $faker->randomElement(['Paliwo+lpg', 'Diesel', 'Paliwo'])
            ]);
        }

        for ($i = 0; $i < 8; $i++) {
            DB::table('carmodels')->insert([
                'name' => $faker->randomElement(['audi', 'bmw', 'mercedes', 'ford', 'skoda', 'fiat', 'citroen', 'Porsche'])
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            DB::table('viewhome')->insert([
                'photo' => $faker->imageUrl()
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

        for ($i = 0; $i < 30; $i++) {
            DB::table('offers')->insert([
                'carname' => $faker->name,
                'id_carmodel' => $faker->numberBetween(1, 8),
                'id_bodytype' => $faker->numberBetween(1, 4),
                'id_fueltype' => $faker->numberBetween(1, 3),
                'course' => $faker->numberBetween(1000, 300000),
                'yearproduction' => $faker->year(),
                'id_vehiclestatus' => $faker->numberBetween(1, 3),
                'id_engine' => $faker->numberBetween(1, 5),
                'id_drive' => $faker->numberBetween(1, 3),
                'id_country' => $faker->numberBetween(1, 30),
                'id_equipment' => $faker->numberBetween(1, 8),
                'id_steeringwheel' => $faker->numberBetween(1, 2),
                'location' => $faker->city,
                'description' => $faker->text(300),
                'price' => $faker->numberBetween(1000, 30000),
                'photo' => $faker->imageUrl(),
                'id_user' => $faker->numberBetween(1, 2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
