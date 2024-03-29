<?php

use Illuminate\Http\Request;


Route::group(["middleware" => "servicekey.validation"], function () {
     Route::resource('students', 'Students\StudentsController');
     Route::resource('subjects', 'Subjects\SubjectsController');
     Route::resource('scores', 'Scores\ScoresController');

});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
