<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

use App\Teacher;

class TestApiController extends Controller
{
    //
    public function test()
    {
    	return \App\Student::paginate(1);
        
    	// return Student::all
    	$data = [
    		'guru'=> Teacher::all()
    	];
    	return $data;

    }
}
