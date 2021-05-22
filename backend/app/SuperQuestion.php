<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperQuestion extends Model
{
    protected $fillable = [
        'quiz_id', 'question', 'points', 'question_type_id'
    ];

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function questionType()
    {
        return $this->hasOne(QuestionType::class);
    }

    public function simpleQuestionAnswers()
    {
        return $this->hasMany(SimpleQuestionAnswer::class);
    }

    public function trueFalseQuestionAnswers()
    {
        return $this->hasMany(TrueFalseQuestionAnswer::class);
    }

    public function multipleQuestionAnswers()
    {
        return $this->hasMany(MultipleQuestionAnswer::class);
    }
}
