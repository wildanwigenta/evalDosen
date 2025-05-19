<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'type', 'weight'];

    public function evaluationAnswers()
    {
        return $this->hasMany(EvaluationAnswer::class);
    }
}
