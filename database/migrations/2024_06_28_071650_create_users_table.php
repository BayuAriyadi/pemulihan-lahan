<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('UserID');
            $table->string('Username')->unique();
            $table->string('Password');
            $table->string('FullName');
            $table->string('NIK');
            $table->string('Institution');
            $table->enum('Role', ['user', 'admin', 'super admin']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
