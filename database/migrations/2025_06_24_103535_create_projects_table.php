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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('category');
        $table->text('short_description')->nullable();
        $table->longText('full_description')->nullable();
        $table->json('technologies')->nullable(); // untuk icon / react-icon name
        $table->string('thumbnail')->nullable(); // gambar utama
        $table->string('code_url')->nullable();
        $table->string('live_demo_url')->nullable();
        $table->boolean('is_featured')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
