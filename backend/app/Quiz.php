<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = array('id');

    protected $fillable = [
        'title', 'subject_id', 'teacher_id', 'duration',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class);
    }

    public function superQuestions()
    {
        return $this->hasMany(SuperQuestion::class);
    }

}
