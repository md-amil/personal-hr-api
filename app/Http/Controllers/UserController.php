<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\Institute;

class UserController extends Controller
{
    function index()
    {
    	return User::take(20)->get();
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            "email" => "required|email",
            'phone' => 'required|digits:10'
        ]);
    	return User::create($request->only(['name','email','phone']) + ['organization_id' => 1]);
    }
    
    function show(User $user)
    {
        return $user->load(
            "skills",
            "educations.institute",
            "educations.course",
            "educations.degree",
            "experiences.company",
            "experiences.jobProfile"
        );
    }

    function update(User $user, Request $request)
    {
        $user->update($request->only(['name','email','phone']));
    }
    
    function destroy(User $user)
    {
        $user->delete();
        return 'user deleted successfully';
    }
}
