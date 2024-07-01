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
        Schema::create('exams', function (Blueprint $table) {
            $table->string('category', 1024);
            $table->string('exam', 1024);
            $table->string('question_number', 1024);
            $table->string('question', 1024);
            $table->string('type', 1024);
            $table->string('option_a', 1024);
            $table->string('option_b', 1024);
            $table->string('option_c', 1024);
            $table->string('option_d', 1024);
            $table->string('option_e', 1024);
            $table->string('option_f', 1024);
            $table->string('answer', 1024);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
