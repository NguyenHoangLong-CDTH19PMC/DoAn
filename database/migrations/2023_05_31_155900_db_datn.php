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
        // tạo bảng Thương hiệu
        Schema::create('table_product_brand', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng Loại Product
        Schema::create('table_product_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng Color
        Schema::create('table_color', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng Size
        Schema::create('table_size', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
     
        // tạo bảng Product
        Schema::create('table_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_brand')->nullable();
            $table->foreign('id_brand')->references('id')->on('table_product_brand')->onDelete('set null');
            $table->unsignedBigInteger('id_type')->nullable();
            $table->foreign('id_type')->references('id')->on('table_product_type')->onDelete('set null');
            $table->string('code',10)->nullable()->unique();
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->double('price_regular')->nullable();
            $table->double('sale_price')->nullable();
            $table->string('status')->nullable();
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng Album
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


        // tạo bảng Role
        Schema::create('table_role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng User
        Schema::create('table_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_role')->nullable();
            $table->foreign('id_role')->references('id')->on('table_role')->onDelete('set null');
            $table->string('name');
            $table->string('gender',3);
            $table->string('birthdate');
            $table->string('email');
            $table->string('phone',11);
            $table->string('address');
            $table->string('avatar');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('table_product_brand');
        Schema::dropIfExists('table_product_type');
        Schema::dropIfExists('table_color');
        Schema::dropIfExists('table_size');
        Schema::dropIfExists('table_album');
        Schema::dropIfExists('table_role');
        Schema::dropIfExists('table_user');
    }
};
