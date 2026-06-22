<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('upvotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps(); // created_at = waktu upvote
            
            $table->unique(['report_id', 'user_id']); // 1 warga 1 upvote per laporan
            $table->index('user_id');
            $table->index('report_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('upvotes');
    }
};