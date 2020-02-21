<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\Institute;
use App\Vacancy;

class UserController extends Controller
{
    function index()
    {
        return User::take(20)->with('vacancies')->get();
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            "email" => "required|email",
            'phone' => 'required|digits:10'
        ]);
        return User::create($request->only(['name', 'email', 'phone']) + ['organization_id' => 1]);
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
        $user->update($request->only(['name', 'email', 'phone']));
    }

    public function attachVacancies(Request $request)
    {
        $data = [];
        $vacancy = Vacancy::find($request->vacancy_id);
        if (!$vacancy) {
            return [
                'status' => 'fail',
                'message' => 'invalid vacancy'
            ];
        }
        foreach ($request->users as $user) {
            $data[] = [
                'user_id' => $user,
                'vacancy_id' => $request->vacancy_id
            ];
        }
        \DB::table("user_vacancy")->insert($data);
        return $vacancy;
    }


    public function detachVacancy(Request $request, User $user, Vacancy $vacancy)
    {
        $user->vacancies()->detach($vacancy);
        return $vacancy;
    }

    function destroy(User $user)
    {
        $user->delete();
        return 'user deleted successfully';
    }
}
