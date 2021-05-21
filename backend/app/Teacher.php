<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{   
    protected $guard = 'teacher_web';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'subject_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
