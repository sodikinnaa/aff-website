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
        Schema::create('website', function (Blueprint $table) {
            $table->id();
            $table->string('nama_web');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('token_website', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('website_id');
            $table->string('token', 40)->unique();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('website_id')->references('id')->on('website')->onDelete('cascade');
            $table->unique(['user_id', 'website_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('token_website');
        Schema::dropIfExists('website');
    }
};
