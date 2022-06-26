<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastQuestions extends Model
{
    use HasFactory;

    public function setFileAttribute($value)
    {
        $this->attributes['file'] = 'file/pastQuestions/' . $value;
    }
}
