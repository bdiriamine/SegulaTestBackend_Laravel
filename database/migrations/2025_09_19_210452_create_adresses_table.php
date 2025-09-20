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
        Schema::create('adresses', function (Blueprint $table) {

            $table->id();
            $table->string('description_adresse');
            $table->decimal('gps_latitude', 10, 8);
            $table->decimal('gps_longitude', 11, 8);
            $table->decimal('gps_altitude', 10, 2)->nullable();
            $table->string('code_nature');
            $table->string('code_categorie');
            $table->timestamps();
            $table->foreign('code_nature')->references('code_nature')->on('nature_adresses');
            $table->foreign('code_categorie')->references('code_categorie')->on('categorie_adresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
