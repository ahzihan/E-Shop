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
        Schema::create('product_carts', function (Blueprint $table) {
            $table->id();
            $table->string('img4',200);
            $table->string('email',200);
            $table->unsignedBigInteger('productId');
            $table->enum('color',['white','black','red','green','blue']);
            $table->enum('size',['S','M','L','XL','XXL']);

            //Relationship
            $table->foreign('email')->references('email')->on('profiles')->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('productId')->references('id')->on('products')->restrictOnDelete()->cascadeOnUpdate();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_carts');
    }
};
