<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $fillable = [
        'id', 'student_id', 'question_id', 'quiz_id', 'is_true', 'answer'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function superQuestions()
    {
        return $this->belongsTo(SuperQuestion::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
