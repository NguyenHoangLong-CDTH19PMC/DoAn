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
        //
        Schema::table('products', function(Blueprint $table){
            $table->foreignId('id_color')->constrained('products');
            $table->foreignId('id_size')->constrained('products');
            $table->foreignId('id_product_type')->constrained('products');
            $table->foreignId('id_brand')->constrained('products');
            $table->foreignId('id_gender')->constrained('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
