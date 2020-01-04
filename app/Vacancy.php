<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
	protected $guarded = ['id'];

    public function users()
    {
    	return $this->belongsToMany(\App\User::class,'user_vacancy');
    }
    public function questions()
    {
    	return $this->hasMany(\App\Question::class);
    }
    public function interviews()
    {
    	return $this->belongsToMany(\App\Interview::class,'vacancy_interview');
    }
    
    
}
