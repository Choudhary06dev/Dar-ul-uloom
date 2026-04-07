<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'student_name', 'father_name', 'dob', 'age', 'gender', 'b_form',
        'parent_name', 'contact_number', 'alternate_number', 'address', 'city',
        'previous_school', 'last_class_passed', 'nazra_completed', 'hifz_completed',
        'course_selection', 'other_course', 'medical_condition', 'emergency_contact',
        'admission_no', 'class_assigned', 'fee', 'remarks', 'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
