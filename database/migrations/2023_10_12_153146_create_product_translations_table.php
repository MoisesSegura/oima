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
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('product_id')->unsigned();
            $table->string('locale')->index();
            $table->timestamps();

            //campos a traducir
            $table->string('name');
            $table->string('file_real')->nullable();
            $table->string('file_real_name')->nullable();
            $table->boolean('delete_file')->nullable();
     
            //Foreign key to the main model
            $table->unique(['product_id', 'locale']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_translations');
    }
};
