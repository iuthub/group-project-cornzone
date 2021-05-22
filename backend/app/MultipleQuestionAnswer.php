<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleQuestionAnswer extends Model
{
    protected $fillable = [
        'super_question_id', 'answer',
    ];

    public function superQuestion()
    {
        return $this->belongsTo(SuperQuestion::class);
    }

    public function multipleQuestionOptionSet()
    {
        return $this->hasOne(MultipleQuestionOptionSet::class);
    }
}
