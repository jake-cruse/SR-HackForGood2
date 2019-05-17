<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Message extends Model
{
    protected $fillable = ['message'];

    public function user()
	{
	  return $this->belongsTo(User::class);
	}

	public function thread()
	{
		return $this->belongsTo('App\Thread');
	}

	public static function addNew(Request $request)
	{
		$message = new Message();
		$message->user_id = Auth::user()->id;
		$message->message = $request->input('message');
		$message->thread_id = $request->input('thread_id');
		$message->save();
		return $message;
	}
}
