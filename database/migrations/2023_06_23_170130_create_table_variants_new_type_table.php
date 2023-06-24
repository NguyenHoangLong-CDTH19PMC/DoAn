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
        Schema::create('table_variants_new_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_new')->nullable();
            $table->foreign('id_new')->references('id')->on('table_new')->onDelete('set null');
            $table->unsignedBigInteger('id_new_type')->nullable();
            $table->foreign('id_new_type')->references('id')->on('table_new_type')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_variants_new_type');
    }
};
