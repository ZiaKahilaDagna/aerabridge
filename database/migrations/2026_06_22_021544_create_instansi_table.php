<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instansi', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('category', 50);
            $table->string('head_name', 150)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
            
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instansi');
    }
};