<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            //$table->integer('id_role');
             $table->string('name')->nullable();
             $table->string('gender')->nullable();
             $table->datetime('birthday')->nullable();
             $table->string('email')->unique()->nullable();
             $table->string('phone')->unique()->nullable();
             $table->string('address')->unique()->nullable();
             $table->string('avatar')->nullable();
             $table->string('username')->unique()->nullable();
             $table->string('password')->unique()->nullable();
             $table->timestamp('email_verified_at')->nullable();
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
};
