<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleQuestionAnswer extends Model
{
    protected $fillable = [
        'super_question_id', 'option_set_id'
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
