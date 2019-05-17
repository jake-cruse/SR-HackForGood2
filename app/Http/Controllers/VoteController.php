<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

use Auth;

class VoteController extends Controller
{
    public function showVote()
    {
    	return view('votes')->with([
    		'topics' => Topic::all(),
            'user' => Auth::user()
    	]);
    }

    public function doVote(Topic $topic)
    {
    	$user = Auth::user();
    	$user->voteFor($topic);

    	return redirect()->back();
    }
}
