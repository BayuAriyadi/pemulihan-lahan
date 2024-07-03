<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaLokasiToLandRecoveryLocationsTable extends Migration
{
    public function up()
    {
        Schema::table('land_recovery_locations', function (Blueprint $table) {
            $table->string('nama_lokasi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('land_recovery_locations', function (Blueprint $table) {
            $table->dropColumn('nama_lokasi');
        });
    }
}
