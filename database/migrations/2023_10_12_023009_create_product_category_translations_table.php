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
        Schema::create('product_category_translations', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('category_id')->unsigned();
            $table->string('locale')->index();
            $table->timestamps();

            //campos a traducir
            $table->string('name');
     
            //Foreign key to the main model
            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category_translations');
    }
};
