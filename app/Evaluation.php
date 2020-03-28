<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function course () {
        return $this->belongsTo(Course::class);
    }
}
