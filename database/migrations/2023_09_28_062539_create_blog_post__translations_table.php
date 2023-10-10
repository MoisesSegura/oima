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
        Schema::create('blog_post_translations', function (Blueprint $table) {
            // mandatory fields
       $table->id(); 
       $table->foreignId('post_id')->unsigned();
       $table->string('locale')->index();
         //campos a traducir
       $table->string('title');
       $table->longText('content'); 

       // Foreign key to the main model
     
       $table->unique(['post_id', 'locale']);
       $table->foreign('post_id')->references('id')->on('blog_posts')->onDelete('cascade');
       
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_post_translations');
    }
};



// Schema::create('blog_post_translations', function (Blueprint $table) {
//     // mandatory fields
// $table->bigIncrements('id'); 
// $table->string('locale')->index();

// // Foreign key to the main model
// //$table->unsignedInteger('blog_post_id');
// $table->unique(['post_id', 'locale']);
// $table->foreignId('post_id')->references('id')->on('blog_posts')->onDelete('cascade');

// //campos a traducir
// $table->string('title');
// $table->longText('content');    
// });

  //$table->unsignedInteger('blog_post_id');