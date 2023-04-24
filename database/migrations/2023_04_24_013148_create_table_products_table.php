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
        Schema::create('table_products', function (Blueprint $table) {
            $table->id();
            $table->string('id_color')->unique();
            $table->string('id_size')->unique();
            $table->string('id_type')->unique();
            $table->string('cat_level1');
            $table->string('cat_level2');
            $table->string('cat_level3');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('content');
            $table->double('price_regular');
            $table->double('sale_price');
            $table->double('discount');
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
        Schema::dropIfExists('table_products');
    }
};
