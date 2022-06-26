<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorBankDetails extends Model
{
    use HasFactory;
    protected  $table = 'tutor_bank_details';

    protected $fillable = ['bank_name','account_name','account_number','user_id'];
}
