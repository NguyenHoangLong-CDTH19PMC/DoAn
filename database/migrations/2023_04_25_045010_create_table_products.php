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
            $table->integer('id_color')->unique()->nullable();
            $table->integer('id_size')->unique()->nullable();
            $table->integer('id_type')->unique()->nullable();
            $table->integer('cat_level1')->unique()->nullable();
            $table->integer('cat_level2')->unique()->nullable();
            $table->integer('cat_level3')->unique()->nullable();
            $table->bigInteger('serial')->nullable();
            $table->string('code',10)->unique();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->double('price_regular')->nullable();
            $table->double('sale_price')->nullable();
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
