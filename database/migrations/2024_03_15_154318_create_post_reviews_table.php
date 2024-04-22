<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('reviewer_id')->constrained('users', 'id', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_reviews');
    }
};
