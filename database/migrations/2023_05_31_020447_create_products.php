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
            $table->string('title', 100);
            $table->string('sortDesc', 500);
            $table->float('price');
            $table->boolean('discount');
            $table->float('discountPrice', 100);
            $table->string('image', 300);
            $table->boolean('stock');
            $table->float('star');
            $table->enum('remark',['popular','new','top','special','trending','regular']);

            $table->unsignedBigInteger('categoryId');
            $table->unsignedBigInteger('brandId');

            //Relationship
            $table->foreign('categoryId')->references('id')->on('categories')->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('brandId')->references('id')->on('brands')->restrictOnDelete()->cascadeOnUpdate();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
