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
        Schema::create('task_comments', function (Blueprint $table) {
            $table->id();
            $table->uuid('comment_uuid')->unique();
            $table->unsignedBigInteger('who_commenter_id');
            $table->unsignedBigInteger('task_id');
            $table->text('comment');
            $table->enum('pimmed',['1','0'])->default('0')->comment('Sabitlenmiş = 1 Normal = 0');
            $table->enum('is_deleted',[1,0])->default(0)->comment('1 = Silindi  0 = Silinmedi');

            $table->foreign('who_commenter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_comments');
    }
};
