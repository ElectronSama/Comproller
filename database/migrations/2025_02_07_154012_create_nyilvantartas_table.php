<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNyilvantartasTable extends Migration
{
    public function up(): void
    {
        Schema::create('nyilvantartas', function (Blueprint $table) {
            $table->id('DolgozoID');
            $table->string('Keresztnev', 255);
            $table->string('Vezeteknev', 255);
            $table->string('Nem', 255);
            $table->date('Szuletesi_datum');
            $table->string('Szuletesi_hely', 255);
            $table->string('Anyja_neve', 255);
            $table->string('Tajszam', 9);
            $table->string('Adoszam', 10);
            $table->string('Bankszamlaszam', 24);
            $table->string('Email', 255);
            $table->decimal('Alaporaber', 10, 2);
            $table->string('Telefon', 15);
            $table->string('Irsz', 4);
            $table->string('Telepules', 255);
            $table->string('Utca_ut', 255);
            $table->string('Tartozkodasi_hely', 255);
            $table->string('Hazszam', 10);
            $table->string('Allampolgarsag', 255);
            $table->string('Muszak', 255);
            $table->string('Munkakor', 255);
            $table->text('Megjegyzes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nyilvantartas');
    }
}
