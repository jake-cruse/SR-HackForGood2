<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classroom;

class LeadersController extends Controller
{
    public function showLeaders()
    {
    	return view('leaderboard')->with([
    		'classes' => Classroom::orderBy('score', 'DESC')->get()
    	]);
    }
}
