<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleQuestionOptionSet extends Model
{
    protected $fillable = [
        'MQA_id', 'text',
    ];

    public function multipleQuestionAnswer()
    {
        return $this->belongsTo(MultipleQuestionAnswer::class);
    }
}
