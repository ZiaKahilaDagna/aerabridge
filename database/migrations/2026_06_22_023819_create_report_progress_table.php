<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('petugas_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            
            $table->enum('status', ['menunggu','dalam_perjalanan', 'pengecekan', 'perbaikan', 'selesai']);
            $table->text('description')->nullable();
            $table->string('photo_evidence_url', 255)->nullable();
            $table->timestamps();
            
            $table->index(['report_id', 'created_at']);
            $table->index('petugas_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_progress');
    }
};