<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\User;

class VacancyController extends Controller
{
	public function index()
    {
		return Vacancy::all();
	}

    public function show(Vacancy $vacancy)
    {
    	return $vacancy->load('questions','users');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'title'=>'required'
        ]);
        $vacancy= Vacancy::Create(
        	['title' => $request->title,'date_of_vacancy'=>now()] + ['organization_id' => 1 ]
        );
        
        return $vacancy;
    }
    
    public function update(Request $request ,Vacancy $vacancy)
    {
        
        $vacancy->update($request->only(['title'])+['date_of_vacancy'=>now(),'organization_id']);
        return $vacancy;
    }
    
    public function destroy(Vacancy $vacancy)
    {
    	$vacancy->delete();
    	return "vacancy deleted successfully";
    }

    public function attachToUser(Vacancy $vacancy,User $user)
    {
        $vacancy->users()->detach($user);
        $vacancy->users()->attach($user);
        return "user attached to vacancy ";
    }
    public function createUser(Request $request,Vacancy $vacancy)
    {  
        $user = User::firstOrCreate($request->only(['name','email','phone']) + ['organization_id' => 1]);
        $vacancy->users()->detach($user);
        $vacancy->users()->attach($user);
        return $user;
    }

}
