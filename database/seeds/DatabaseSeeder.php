<?php

use Illuminate\Database\Seeder;

use App\Skill;
use App\User;
use App\Education;
use App\Experience;
use App\Company;
use App\Course;
use App\Institute;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    protected $degrees = [
		"Graduate", 
		"Post Graduate",
		"Diploma",
		"Under Graduate"
	];
    public function run()
    {
    	\DB::transaction(function() {
    		$this->seed();
    	});
	}

    public function seed() {
    
    	factory(Skill::class, 20)->create([ 'organization_id' => 1 ]);
    	factory(Institute::class, 20)->create();
    	factory(Course::class, 20)->create();
    	factory(Company::class, 20)->create();

        foreach($this->degrees as $d) {
            App\Degree::create([ 'name' => $d ]);
        }

    	factory(User::class, 100)->create([ 'organization_id' => 1 ])->each(function($user) {
    		factory(Education::class, random_int(2, 6))->create([ 'user_id' => $user->id ]);
    		factory(Experience::class, random_int(1, 8))->create([ 'user_id' => $user->id ]);
    		foreach(range(1, random_int(1, 15)) as $id) {
	    		$user->skills()->attach( Skill::inRandomOrder()->first()->id );
    		}
    	});
    }
}
