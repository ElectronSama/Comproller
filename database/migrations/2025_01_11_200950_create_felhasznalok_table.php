<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('felhasznalok', function (Blueprint $table) {
            $table->id();
            $table->string('felhasznalonev')->unique();
            $table->string('jelszo');
            $table->string('szerep')->unique();
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprollerfelhasznalok');
    }
};
