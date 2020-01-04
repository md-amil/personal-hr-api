<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Experience;
use App\User;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Experience::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        $this->validate($request,[
            'institute'=>'required',
            'course'=>'required'
        ]);
        $company = Company::firstOrCreate(['name' => $request->company]);
        $jobProfile= JobProfile::firstOrCreate(['name' => $request->job_profile] + ['organization_id' => 1 ]);
        $experience = new Experience([
            'company_id' => $company->id,
            'job_profile_id' => $jobProfile->id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at
        ]);
        $user->experiences()->save($experience);
        return $experience->load('jobProfile','company');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $company = Company::firstOrCreate(['name' => $request->company]);
        $jobProfile= JobProfile::firstOrCreate(['name' => $request->job_profile] + ['organization_id' => 1 ]);
        $experience ->update([
            'company_id' => $company->id,
            'job_profile_id' => $jobProfile->id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at
        ]);
        return $experience;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,Experience $experience)
    {
        $experience->delete();
        return "experience deleted successfully";
    }
}
