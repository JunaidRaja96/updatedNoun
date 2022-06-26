<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudenTutorCourse extends Model
{
    use HasFactory;
    protected  $table = 'student_tutor_course';

    protected $fillable = ['student_id','tutor_course_id'];
}
