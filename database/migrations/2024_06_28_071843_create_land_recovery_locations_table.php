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
        Schema::create('land_recovery_locations', function (Blueprint $table) {
            $table->increments('LocationID');
            $table->integer('UserID')->unsigned();
            $table->integer('DesaID')->unsigned();
            $table->string('Alamat');
            $table->decimal('Latitude', 10, 7);
            $table->decimal('Longitude', 10, 7);
            $table->decimal('LuasLahan');
            $table->integer('JumlahBibit');
            $table->integer('BibitID')->unsigned();
            $table->string('Dokumentasi')->nullable();
            $table->string('KMLFile')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('UserID')->references('UserID')->on('users');
            $table->foreign('DesaID')->references('DesaID')->on('desa');
            $table->foreign('BibitID')->references('BibitID')->on('bibit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_recovery_locations');
    }
};
