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
        Schema::create('subject_scores', function (Blueprint $table) {
            $table->foreignId('student_id');
            $table->string('mathematics')->nullable();
            $table->string('english')->nullable();
            $table->string('biology')->nullable();
            $table->string('civic')->nullable();
            $table->string('physics')->nullable();
            $table->string('chemistry')->nullable();
            $table->string('arabic')->nullable();
            $table->string('health education')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_scores');
    }
};
