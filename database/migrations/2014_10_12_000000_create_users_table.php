<?php

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{  use HasUuids;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id')->unique();
            $table->string('name');
            $table->string('surname');
            $table->string("user_name")->unique()->index(); 
            $table->string('phone',11)->unique()->nullable();
            $table->longText('address')->nullable();
            $table->enum('role',['teacher','student','admin']); 
            $table->longText('user_detail')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->enum('friend_allow',[1,0])->default('0')->comment('1 = istekler acık ,0 = istekler kapalı');
            $table->string('email')->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

          

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

// user
