<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'title'
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

}
