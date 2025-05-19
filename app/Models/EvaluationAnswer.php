<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['evaluation_id', 'questionnaire_id', 'score', 'note'];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}

