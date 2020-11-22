<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'phone', 'message', 'step_id'];
}
