<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Thread;

class ChatsController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function showChat(Thread $thread)
	{
		return view('chat')->with([
			'thread' => $thread
		]);
	}

	public function showThreads()
	{
		$threads = Thread::all();
		return view('threads')->with([
			'threads' => $threads
		]);
	}

	public function doAddThread(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'name' => 'required|unique:threads'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Thread::addNew($request);
        return redirect()->to('/threads')->with('success', 'Thread added successfully!');
	}

	public function fetchMessages(Thread $thread)
	{
		return Message::with('user')->get();
	}

	public function sendMessage(Request $request)
	{
		$user = Auth::user();
		$thread = Thread::findOrFail($request->input('thread_id'));
		$message = Message::addNew($request);

		broadcast(new MessageSent($user, $message, $thread))->toOthers();

		return ['status' => 'Message Sent!'];
	}
}
