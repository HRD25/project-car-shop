<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('carname'); //nazwa samochodu
            $table->integer('id_carmodel'); //model samochodu
            $table->integer('id_bodytype'); //rodzaj nadwozia
            $table->string('id_fueltype'); //rodzaj paliwa
            $table->string('course'); //przebieg
            $table->year('yearproduction'); //rok produkcji
            $table->string('id_vehiclestatus'); //status pojazdu
            $table->integer('id_engine'); //silnik
            $table->string('id_drive'); //napęd
            $table->integer('id_country'); //kraj pochodzenia
            $table->integer('id_equipment'); //dodatkowe wyposazenie
            $table->string('id_steeringwheel'); //kierownica
            $table->string('location'); //lokalizacja
            $table->text('description'); //Opis
            $table->integer('price'); // cena
            $table->string('photo'); //zdjecia
            $table->integer('id_user'); //id uzytkownika
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
