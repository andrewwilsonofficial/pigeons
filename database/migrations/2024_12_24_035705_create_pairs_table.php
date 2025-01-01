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
        Schema::create('pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('season_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('cock_id')->nullable()->constrained('pigeons')->cascadeOnDelete();
            $table->foreignId('hen_id')->nullable()->constrained('pigeons')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date_paired')->nullable();
            $table->date('date_separated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pairs');
    }
};
