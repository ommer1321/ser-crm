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
        Schema::create('grup_notifications', function (Blueprint $table) {
            $table->id();
            $table->uuid('notification_uuid');
            $table->text('model_uuid');

            $table->unsignedBigInteger('grup_id')->index();
            $table->unsignedBigInteger('sender_id')->index();            
            $table->unsignedBigInteger('user_id')->index();

            $table->enum('is_sended',['1','0'])->default(0)->comment('0 görülmedi 1 görüldü');
            $table->enum('model',['task','news','friendship_request','task_comment','news_comment']);
            $table->text('message');

            $table->foreign('grup_id')->references('id')->on('grups')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grup_notifications');
    }
};
