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
        Schema::create('pigeons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sire_id')->nullable()->constrained('pigeons')->nullOnDelete();
            $table->foreignId('dam_id')->nullable()->constrained('pigeons')->nullOnDelete();
            $table->string('name')->nullable();
            $table->string('band')->nullable();
            $table->string('second_band')->nullable();
            $table->string('color_description')->nullable();
            $table->string('location')->nullable();
            $table->string('family')->nullable();
            $table->string('last_owner')->nullable();
            $table->integer('rating')->default(0)->nullable();
            $table->string('color')->nullable();
            $table->string('eye')->nullable();
            $table->string('leg')->nullable();
            $table->string('markings')->nullable();
            $table->string('status')->nullable();
            $table->enum('sex', ['unknown', 'cock', 'hen'])->default('unknown');
            $table->string('notes')->nullable();
            $table->date('date_hatched')->nullable();
            $table->boolean('is_public')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pigeons');
    }
};
