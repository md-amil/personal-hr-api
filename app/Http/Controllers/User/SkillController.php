<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Skill;
use App\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Skill::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $skill = Skill::firstOrCreate($request->only(['name']) + ['organization_id' => 1]);
        $user->skills()->detach($skill);
        $user->skills()->attach($skill);
        return $skill;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Skill $skill)
    {
        $skill->update($request->only('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Skill $skill)
    {
        $skill->delete();
        return "skill deleted successfully";
    }
}
