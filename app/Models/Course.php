<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'semester', 'tahun_ajaran'];

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class, 'lecturer_course');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
