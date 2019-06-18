<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        foreach ($messages as $message) {
        	if ($message->status == "Unread") {
        		$message->status = "Read";
        		$message->save();
        	}
        }

        return view('messages.index', compact('messages'));
    }
}
