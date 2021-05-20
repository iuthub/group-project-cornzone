<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleQuestionOptionSet extends Model
{
    protected $fillable = [
        'option1', 'option2', 'option3', 'option4'
    ];

    public function multipleQuestionAnswer()
    {
        return $this->belongsTo(MultipleQuestionAnswer::class);
    }
}
