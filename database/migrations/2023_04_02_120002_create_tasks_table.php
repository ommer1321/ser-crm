<?php

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasUuids;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('task_id')->unique();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('grup_id')->nullable();
            $table->string('title');
            $table->longText('note');
            $table->json('user_answers')->nullable();
            $table->json('tagged_users')->nullable();
            $table->date('finished_at')->nullable();
            $table->enum('status',['red','yellow','green']);
            $table->foreign('grup_id')->references('id')->on('grups')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
