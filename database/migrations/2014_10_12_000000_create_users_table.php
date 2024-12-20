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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->string('role')->default('user');
            $table->integer('trust_level')->default(0);
            $table->unsignedBigInteger('sell_count')->default(0);
            $table->unsignedBigInteger('reward_points')->default(0);
            $table->string('oauth_id')->nullable();
            $table->string('oauth_type')->nullable();
            $table->string('oauth_image')->nullable();
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
