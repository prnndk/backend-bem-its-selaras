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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');
            $table->text('content');
            $table->string('image');
            $table->string('image_caption')->nullable();
            $table->string('slug');
            $table->integer('views')->default(0);
            $table->string('tag')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_published')->default(false);
            $table->enum('status', ['draft', 'revised', 'accepted', 'published', 'rejected'])->default('draft');
            $table->foreignId('kemenkoan_id')->nullable()->constrained('kemenkoans');
            $table->foreignId('kementerian_id')->nullable()->constrained('kementerians');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
