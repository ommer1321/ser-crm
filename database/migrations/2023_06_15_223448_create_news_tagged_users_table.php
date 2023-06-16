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
        Schema::create('grup_news_tagged_users', function (Blueprint $table) {
            $table->id();
          
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('grup_id');
            $table->unsignedBigInteger('user_id');
     
            $table->foreign('news_id')->references('id')->on('grup_news')->onDelete('cascade');
            $table->foreign('grup_id')->references('id')->on('grups')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grup_news_tagged_users');
    }
};
