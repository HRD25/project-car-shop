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
            $table->string('carname')->index(); //nazwa samochodu
            $table->integer('id_carmodel')->index(); //model samochodu
            $table->integer('id_bodytype')->index(); //rodzaj nadwozia
            $table->string('id_fueltype')->index(); //rodzaj paliwa
            $table->string('course')->index(); //przebieg
            $table->year('yearproduction')->index(); //rok produkcji
            $table->string('id_vehiclestatus')->index(); //status pojazdu
            $table->integer('id_engine')->index(); //silnik
            $table->string('id_drive')->index(); //napęd
            $table->integer('id_country'); //kraj pochodzenia
            $table->integer('id_equipment')->index(); //dodatkowe wyposazenie
            $table->string('id_steeringwheel')->index(); //kierownica
            $table->string('location'); //lokalizacja
            $table->text('description'); //Opis
            $table->integer('price')->index(); // cena
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
