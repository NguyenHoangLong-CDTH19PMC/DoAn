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
            //$table->string('id_color');
            //$table->string('id_size');
            //$table->string('id_type');
            //$table->string('cat_level1');
            //$table->string('cat_level2');
            //$table->string('cat_level3');
            $table->string('code')->unique();
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
