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
            $table->string('carmodel'); //model samochodu
            $table->string('bodytype'); //rodzaj nadwozia
            $table->string('fueltype'); //rodzaj paliwa
            $table->string('course'); //przebieg
            $table->date('yearproduction'); //rok produkcji
            $table->string('vehiclestatus'); //status pojazdu
            $table->string('engine'); //silnik
            $table->string('drive'); //napęd
            $table->string('country'); //kraj pochodzenia
            $table->integer('id_additionalequipment'); //dodatkowe wyposazenie
            $table->string('steeringwheel'); //kierownica
            $table->string('location'); //lokalizacja
            $table->text('description'); //Opis
            $table->integer('price'); // cena
            $table->string('photos'); //zdjecia
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
