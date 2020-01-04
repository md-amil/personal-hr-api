<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name'];

    function users()
    {
    	return $this->hasManyThrough(User::class,Education::class);
    }

}
