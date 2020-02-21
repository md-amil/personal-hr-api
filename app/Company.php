<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $guarded = ["id"];
    public $timestmaps = false;
}
