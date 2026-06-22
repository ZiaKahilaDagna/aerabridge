<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_comment_id')->nullable()->constrained('report_comments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('content');
            $table->boolean('is_internal')->default(false)->comment('true = internal pemerintah, false = publik');
            $table->timestamps();
            
            $table->index(['report_id', 'created_at']);
            $table->index('parent_comment_id');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_comments');
    }
};