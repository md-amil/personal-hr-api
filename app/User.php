<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, "user_skill");
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'user_vacancy');
    }
    // public function questions(){
    //     return $this->belongsToMany(App\Question::class);
    // }
    // public function interviews(){
    //     return $this->
    // }
}
