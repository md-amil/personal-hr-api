<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $table = 'educations';
	protected $guarded = ['id'];
	protected $casts = [ 'start_at' => 'date', 'end_at' => 'date' ];

	public function institute()
	{
		return $this->belongsTo(Institute::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function degree()
	{
		return $this->belongsTo(Degree::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
