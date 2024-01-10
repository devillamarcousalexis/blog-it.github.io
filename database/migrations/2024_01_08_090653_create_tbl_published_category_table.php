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
        Schema::create('tbl_published_category', function (Blueprint $table) {
            $table->id('published_category_id');
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('blog_id')->on('tbl_blog');
            $table->integer('category_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_published_category');
    }
};
