<?php

use Illuminate\Http\Request;

/**
 * Route::get("/users/{user}/skills", "User\SkillControlelr@index");
 * Route::post("/users/{user}/skills", "User\SkillControlelr@store");
 * Route::put("/users/{user}/skills/{skill}", "User\SkillControlelr@update");
 * Route::delete("/users/{user}/skills{skill}", "User\SkillControlelr@delete");
 */
Route::post('vacancies/{vacancy}/users/{user}/attach','VacancyController@attachToUser');
Route::post('vacancies/{vacancy}/users/create','VacancyController@createUser');

Route::resources([
	'users' => 'UserController',
	'users.educations'=> 'User\EducationController',
	'users.skills' => 'User\SkillController',
	'users.experiences'=>'User\ExperienceController',
	'interviews'=>'InterViewController',
	'vacancies'=>'VacancyController',
	'vacancies.questions'=> 'QuestionController'
]);


