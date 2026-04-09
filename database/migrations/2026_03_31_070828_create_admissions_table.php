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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('students')->onDelete('cascade');
            
            // Student Info
            $table->string('student_name');
            $table->string('image')->nullable();
            $table->string('father_name');
            $table->date('dob');
            $table->integer('age');
            $table->string('gender'); 
            $table->string('b_form')->nullable();
            
            // Contact Info
            $table->string('parent_name');
            $table->string('contact_number');
            $table->string('alternate_number')->nullable();
            $table->text('address');
            $table->string('city');
            
            // Education Info
            $table->string('previous_school')->nullable();
            $table->string('last_class_passed')->nullable();
            $table->boolean('nazra_completed')->default(false);
            $table->boolean('hifz_completed')->default(false);
            
            // Course Selection
            $table->string('course_selection');
            $table->string('other_course')->nullable();
            
            // Additional Info
            $table->text('medical_condition')->nullable();
            $table->string('emergency_contact');
            
            // Office Use Only
            $table->string('admission_no')->nullable();
            $table->string('class_assigned')->nullable();
            $table->string('fee')->nullable();
            $table->text('remarks')->nullable();
            $table->string('status')->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
