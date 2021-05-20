<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    protected $fillable = [
        'title'
    ];

    public function superQuestion()
    {
        return $this->belongsTo(SuperQuestion::class);
    }
}
