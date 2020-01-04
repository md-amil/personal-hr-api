<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $guarded = ['id'];

    public function vacancies()
    {
    	return $this->belongsToMany(\App\Vacancy::class,'vacancy_interview');
    }

}
