<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('title', 200);
            $table->text('description');
            $table->string('photo_url', 255)->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('location_address', 255)->nullable();
            $table->string('category', 50);
            $table->decimal('priority_score', 5, 2)->default(0.00)->comment('Skor prioritas dari AI 0-100');
            $table->text('ai_analysis_result')->nullable()->comment('Hasil analisis AI dalam format JSON');
            $table->enum('status', ['baru', 'divalidasi', 'ditolak', 'diproses', 'selesai'])->default('baru');
            $table->timestamps();
            
            $table->index('status');
            $table->index('category');
            $table->index(['priority_score', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};