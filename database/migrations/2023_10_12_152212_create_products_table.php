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
            $table->string('image')->nullable();
            $table->string('scientific_name');
            $table->string('family_name');
            $table->unsignedBigInteger('category_id');
            $table->string('slug')->unique();
            $table->string('hide_locale')->nullable();
            $table->boolean('delete_image')->nullable();
            $table->timestamps();

            // $table->foreign('category_id')->references('id')->on('product_categories');
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
