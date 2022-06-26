<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_id', 'title', 'slug', 'image', 'description', 'content'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = 'images/blog/' . $value;
    }
}
