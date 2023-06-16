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
        Schema::create('grup_news', function (Blueprint $table) {
            $table->id();
            $table->uuid('news_uuid')->unique();
            $table->unsignedBigInteger('posted_user_id');
            $table->unsignedBigInteger('grup_id');
            $table->string('title')->nullable();
            $table->text('note');

            $table->json('tages')->nullable();
            $table->json('images_paths')->nullable(); 
            $table->json('tagged_users')->nullable();
            $table->json('student_feedback')->nullable();  
            
            $table->enum('status',['1','0'])->default('1')->comment('1 = Aktif - 0 = Pasif');
            $table->enum('pimmed',['1','0'])->default('0')->comment('Sabitlenmiş = 1 Normal = 0');
            $table->enum('is_deleted',['1','0'])->default('0')->comment('1 = Silindi  0 = Silinmedi');
            
            $table->foreign('grup_id')->references('id')->on('grups')->onDelete('cascade');
            $table->foreign('posted_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grup_news');
    }
};
