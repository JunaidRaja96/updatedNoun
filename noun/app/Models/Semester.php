<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['year','semester_no','status'];

    public function subscribe()
    {
         return $this->hasMany(StudentSubscription::class,'semester_id','id');
    }
}
