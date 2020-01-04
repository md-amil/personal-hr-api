<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded =['id'];

    public function vacancy()
    {
    	return $this->belongsTo(App\Vacancy::class);
    }


}
