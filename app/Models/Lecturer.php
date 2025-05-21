<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'nidn', 'email'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'lecturer_course');
        
    }
      
}

