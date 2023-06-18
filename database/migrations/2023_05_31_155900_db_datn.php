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
        // tạo bảng danh mục cấp 1 product
        Schema::create('table_product_level1', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng danh mục cấp 2 product
        Schema::create('table_product_level2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_level1')->nullable();
            $table->foreign('id_level1')->references('id')->on('table_product_level1')->onDelete('set null');
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng color
        Schema::create('table_color', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng size
        Schema::create('table_size', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
     
        // tạo bảng product
        Schema::create('table_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_level1')->nullable();
            $table->foreign('id_level1')->references('id')->on('table_product_level1')->onDelete('set null');
            $table->unsignedBigInteger('id_level2')->nullable();
            $table->foreign('id_level2')->references('id')->on('table_product_level2')->onDelete('set null');
            $table->string('code',10)->nullable();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->double('price_regular')->nullable();
            $table->double('sale_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng album
        Schema::create('table_album', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng phụ cho bảng Product và bảng Color
        Schema::create('table_variants_color_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->unsignedBigInteger('id_color')->nullable();
            $table->foreign('id_color')->references('id')->on('table_color')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng phụ cho bảng Product và bảng Size
        Schema::create('table_variants_size_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->unsignedBigInteger('id_size')->nullable();
            $table->foreign('id_size')->references('id')->on('table_size')->onDelete('set null');
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
        Schema::dropIfExists('table_product');
        Schema::dropIfExists('table_product_level1');
        Schema::dropIfExists('table_product_level2');
        Schema::dropIfExists('table_product_level3');
        Schema::dropIfExists('table_color');
        Schema::dropIfExists('table_size');
        Schema::dropIfExists('table_album');
    }
};
