<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('seller_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_quanity');
            $table->string('product_size')->nullable();
            $table->string('product_price');
            $table->string('product_color')->nullable();
            $table->text('product_description');
            $table->string('product_image');
            $table->integer('product_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
