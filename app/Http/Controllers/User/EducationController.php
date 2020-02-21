<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Institute;
use \App\Course;
use \App\User;
use \App\Education;
use Carbon\Carbon;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Education::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'institute' => 'required',
            'course' => 'required'
        ]);
        $institute = Institute::firstOrCreate(['name' => $request->institute]);
        $course = Course::firstOrCreate(['name' => $request->course]);
        $education = new Education([
            'institute_id' => $institute->id,
            'course_id' => $course->id,
            'start_at' => Carbon::parse($request->start_at),
            'end_at' => $request->end_at ? Carbon::parse($request->end_at) : null
        ]);
        $user->educations()->save($education);
        return $education->load('institute', 'course');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Education $education)
    {
        $institute = Institute::firstOrCreate(['name' => $request->institute]);
        $course = Course::firstOrCreate(['name' => $request->course]);

        $education->update([
            'institute_id' => $institute->id,
            'course_id' => $course->id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at ? Carbon::parse($request->end) : null
        ]);
        return $education;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Education $education)
    {
        $education->delete();
        return [
            "message" => "education deleted successfully"
        ];
    }
}
