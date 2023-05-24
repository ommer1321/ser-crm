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
        Schema::create('friendship_allow_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('who_send');
            $table->unsignedBigInteger('who_get');
            $table->enum('status',['pending', 'approved', 'rejected'])->default('pending')->comment('pending = bekleyen approved = onaylandı rejected = reddedildi');
            $table->enum('is_deleted',[1,0])->default(0)->comment('1 = Silindi  0 = Silinmedi');

            $table->foreign('who_send')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('who_get')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendship_allow_statuses');
    }
};
