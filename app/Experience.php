<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	protected $guarded = ['id'];
	protected $casts = [
		'start_at' => "date",
		"end_at" => "date"
	];
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
