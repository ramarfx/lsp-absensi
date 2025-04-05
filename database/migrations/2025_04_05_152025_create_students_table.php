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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('nis', 16);
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
            //0: cewe, 1: cowo
            $table->boolean('gender');
            // $table->foreignId('attendance_id')->nullable()->constrained('attendances')->onDelete('cascade')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
