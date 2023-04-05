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
// INSERT INTO `users` (`id`, `user_id`, `name`, `surname`, `user_name`, `phone`, `address`, `role`, `user_detail`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, '32bd9142-d323-11ed-b70f-8c8caa20f3ca', 'Ömer Faruk', 'Çetin', 'ommer1453', '05422249930', 'asdsadsadsdsadsadsdsads', 'teacher', 'sadasdsadsadsadsdsads', '1321o.faruk@gmail.com', NULL, '$2y$10$SnPfgFK4Aqw9nA5nd7AqROTjWfKDW2HYrr8E/HnBXp37YX1e6ZCT2', NULL, NULL, NULL);