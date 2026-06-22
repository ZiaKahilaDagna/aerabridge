<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('super_admin_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->enum('verification_status', ['valid', 'invalid', 'perlu_revisi']);
            $table->text('note')->nullable()->comment('Catatan dari super admin');
            $table->timestamps(); // created_at = waktu verifikasi
            
            $table->unique('report_id'); // 1 laporan hanya 1 verifikasi
            $table->index('super_admin_id');
            $table->index('verification_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_verifications');
    }
};