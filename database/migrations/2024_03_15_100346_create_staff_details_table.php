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
        Schema::create('staff_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('image');
            $table->foreignId('jabatan_id')->constrained('jabatans');
            $table->foreignId('kementerian_id')->nullable()->constrained('kementerians');
            $table->foreignId('kemenkoan_id')->nullable()->constrained('kemenkoans');
            $table->foreignId('kedirjenan_id')->nullable()->constrained('kedirjenans');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_details');
    }
};
