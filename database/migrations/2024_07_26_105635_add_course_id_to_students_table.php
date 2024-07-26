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
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->restrictOnDelete();
            
            $table->string('student_id', 100)->index();
            $table->string('image')->nullable(true);

            // $table->foreignId('course_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
