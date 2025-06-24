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
    Schema::create('certificates', function (Blueprint $table) {
        $table->id();
        $table->string('name');         // Nama sertifikat
        $table->string('issuer');       // Penerbit
        $table->date('issued_at')->nullable();   // Tanggal terbit
        $table->string('image')->nullable();     // Gambar sertifikat
        $table->string('certificate_url')->nullable(); // Link ke PDF atau detail (opsional)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
