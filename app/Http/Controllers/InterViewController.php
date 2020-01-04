<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interview;
class InterViewController extends Controller
{
    public function index(){
    	return Interview::all();
    }
    public function show(Request $request,Interview $interview){
    	return $interview;
    }
    public function store(Request $request){
    	return Interview::create(
    		$request->only(['title','type'])+['organization_id' => 1 ]
    	);
    }
    public function update(Request $request,Interview $interview){
         
    	$interview->update($request->only(['title','type'])+['organization_id' => 1 ]);
    	return $interView;
    }
    public function destroy(Interview $interView){
    	$interView->delete();
    	return "interview deleted successfully";
    }
}
