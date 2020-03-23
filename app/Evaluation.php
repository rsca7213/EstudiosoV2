<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public $timestamps = false;

    public function course () {
        return $this->belongsTo(Course::class);
    }
}
