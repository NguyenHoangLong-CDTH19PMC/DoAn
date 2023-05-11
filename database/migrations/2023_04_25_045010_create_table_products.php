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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('id_color')->unique();
            $table->integer('id_size')->unique();
            $table->integer('id_type')->unique();
            $table->integer('cat_level1')->unique();
            $table->integer('cat_level2')->unique();
            $table->integer('cat_level3')->unique();
            $table->string('code',10)->unique();
            $table->string('name');
            $table->string('content');
            $table->string('photo');
            $table->double('price_regular');
            $table->double('sale_price');
            $table->double('discount');
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
        Schema::dropIfExists('products');
    }
};
