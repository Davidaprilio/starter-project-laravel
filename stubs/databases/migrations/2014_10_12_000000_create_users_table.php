<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sapaan', 20);
            $table->string('panggilan', 50);
            $table->string('phone');
            $table->string('photo')->nullable();
            $table->foreignId('provinsi')->nullable();
            $table->foreignId('kota')->nullable();
            $table->foreignId('desa')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->date('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('remember_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
