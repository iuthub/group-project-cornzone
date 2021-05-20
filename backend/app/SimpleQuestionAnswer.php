<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpleQuestionAnswer extends Model
{
    protected $fillable = [
        'answer', 'super_question_id'
    ];

    public function superQuestion()
    {
        return $this->belongsTo(SuperQuestion::class);
    }
}
