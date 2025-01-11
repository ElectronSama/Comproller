<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nyilvantartas', function (Blueprint $table) {
            $table->id('DolgozoID');
            $table->string('Keresztnev');
            $table->string('Vezeteknev');
            $table->string('Szuletesi_datum');
            $table->string('Anyja_neve');
            $table->string('Tajszam');
            $table->string('Adoszam');
            $table->string('Bankszamlaszam');
            $table->string('Cim');
            $table->string('Allampolgarsag');
            $table->string('Tartozkodasi_hely');
            $table->string('Szemelyigazolvany_szam');
            $table->string('Email');
            $table->string('Telefonszam');
            $table->string('Munkakor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nyilvantartas');
    }
};