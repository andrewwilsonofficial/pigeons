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
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('type', ['one-loft', 'futurity', 'club', 'combine', 'federation', 'training'])->nullable();
            $table->date('date')->nullable();
            $table->string('club_name')->nullable();
            $table->string('club_number')->nullable();
            $table->string('club_location')->nullable();
            $table->string('combine_name')->nullable();
            $table->string('release_point_name')->nullable();
            $table->string('release_longitude')->nullable();
            $table->string('release_latitude')->nullable();
            $table->string('destination_point_name')->nullable();
            $table->string('destination_longitude')->nullable();
            $table->string('destination_latitude')->nullable();
            $table->string('release_temperature')->nullable();
            $table->string('release_weather')->nullable();
            $table->string('release_notes')->nullable();
            $table->string('destination_temperature')->nullable();
            $table->string('destination_weather')->nullable();
            $table->string('destination_notes')->nullable();
            $table->string('total_birds')->nullable();
            $table->string('total_lofts')->nullable();
            $table->dateTime('release_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
