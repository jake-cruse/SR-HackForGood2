<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Thread extends Model
{
    public static function addNew(Request $request)
    {
    	$thread = new Thread();
    	$thread->name = $request->name;
    	$thread->save();
    }
}
