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
        Schema::create('grups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->uuid('grup_id')->unique();
            $table->string('branch');
            $table->string('logo_path')->nullable();
            $table->integer('limit')->default('8');
            $table->string('name');
            $table->mediumText('details')->nullable();
            $table->enum('status',['1','0'])->default('1')->comment('1 = Açık - 0 = Kapalı');

            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grups');
    }
};
