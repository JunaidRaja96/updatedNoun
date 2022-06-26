<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "tma_test",
        "past_questions",
        "connect_with_tutor",
        "become_a_tutor",
        "account_name",
        "account_number",
        "bank",
        "completed",
    ];
    public function semester()
    {
         return $this->belongsTo(Semester::class);
    }
    public function users()
    {
         return $this->belongsTo(User::class);
    }
}
