<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $fillable = [
        'answer'
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
