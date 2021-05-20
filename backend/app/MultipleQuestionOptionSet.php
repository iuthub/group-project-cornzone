<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleQuestionOptionSet extends Model
{
    public function multipleQuestionAnswer()
    {
        return $this->belongsTo(MultipleQuestionAnswer::class);
    }
}
