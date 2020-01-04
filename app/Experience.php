<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{	
	protected $guarded = ['id'];

	function user()
	{
		return $this->belongsTo(User::class);
	}

    function jobProfile()
    {
    	return $this->belongsTo(JobProfile::class);
    }

    function company()
    {
    	return $this->belongsTo(Company::class);
    }
}
