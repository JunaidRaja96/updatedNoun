<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorCourse extends Model
{
    use HasFactory;
    protected  $table = 'tutor_courses';

    protected $fillable = ['course_id','select_days','to','from','user_id'];
    public function course()
    {
         return $this->belongsTO(Course::class,'course_id','id');
    }
    public function user()
    {
         return $this->belongsTO(User::class);
    }
}
