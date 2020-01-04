<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Vacancy;

class QuestionController extends Controller
{
    public function index(Vacancy $vacancy)
    {
    	return $vacancy->questions;
    }

    public function show(Request $request,Vacancy $vacancy,Question $question)
    {
        return $question;
    }

    public function store(Request $request,Vacancy $vacancy)
    {
    	return $vacancy->questions()->create(
    		$request->only(['title','type','answer'])+ ['organization_id' => 1 ]
    	);
    }

    public function update(Request $request,Vacancy $Vacancy,Question $question)
    {
        $question->update($request->only(['title','type','answer']));
        return $question;
    }
    public function destroy(Vacancy $vacancy,Question $question)
    {
        $question->delete();
        return "question deleted successfully";
    }
}
