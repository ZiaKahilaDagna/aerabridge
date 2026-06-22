<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('instansi_id')->constrained('instansi')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('petugas_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('assigned_by')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->dateTime('deadline')->nullable();
            $table->timestamps();
            
            $table->unique('report_id');
            $table->index('petugas_id');
            $table->index('instansi_id');
            $table->index('deadline');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_assignments');
    }
};