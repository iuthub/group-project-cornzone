<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpleQuestionAnswer extends Model
{
    protected $fillable = [
        'answer'
    ];

    public function superQuestion()
    {
        return $this->belongsTo(SuperQuestion::class);
    }
}
