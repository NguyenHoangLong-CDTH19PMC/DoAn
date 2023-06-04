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
        // tạo bảng product
        Schema::create('table_product', function (Blueprint $table) {
            $table->id();
            $table->integer('id_color')->nullable()->default(0);
            $table->integer('id_size')->nullable()->default(0);
            $table->integer('id_level1')->nullable()->default(0);
            $table->integer('id_level2')->nullable()->default(0);
            $table->integer('id_level3')->nullable()->default(0);
            $table->string('code',10)->unique();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->double('price_regular')->nullable();
            $table->double('sale_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng danh mục cấp 1 product
        Schema::create('table_product_level1', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng danh mục cấp 2 product
        Schema::create('table_product_level2', function (Blueprint $table) {
            $table->id();
            $table->integer('id_level1')->unique()->nullable()->default(0);
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng danh mục cấp 3 product
        Schema::create('table_product_level3', function (Blueprint $table) {
            $table->id();
            $table->integer('id_level1')->unique()->nullable()->default(0);
            $table->integer('id_level2')->unique()->nullable()->default(0);
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng color
        Schema::create('table_color', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        // tạo bảng size
        Schema::create('table_size', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        // tạo bảng album
        Schema::create('table_album', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        // // chỉnh sửa bảng thêm khoá ngoại
        // Schema::table('table_product', function(Blueprint $table){
        //     $table->foreignId('id_color')->constrained('table_product');
        //     $table->foreignId('id_size')->constrained('table_product');
        //     $table->foreignId('id_level1')->constrained('table_product');
        //     $table->foreignId('id_level2')->constrained('table_product');
        //     $table->foreignId('id_level3')->constrained('table_product');

        // });
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
