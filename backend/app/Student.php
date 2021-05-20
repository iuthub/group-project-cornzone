<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email','password',
    ];

    public function quiz()
    {
        return $this->belongsToMany(Quiz::class);
    }

}
