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
            $table->string('title');
            $table->string('category');
            $table->string('metaTitle');
            $table->string('productCode');
            $table->string('productSKU');
            $table->text('description');
            $table->text('metaDescription');
            $table->float('price');
            $table->integer('quantity');
            $table->string('productStatus');
            $table->float('regularPrice');
            $table->float('salePrice');
            $table->integer('weight');
            $table->integer('units');
            $table->string('image')->nullable();
            $table->boolean('approved')->default(false);
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
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
