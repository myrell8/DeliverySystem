<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class MessagesController extends Controller
{
    public function index()
    {
        // $message = new Message;
        // $message->setAttribute('type', "refresh");
        // $message->setAttribute('message', "You refreshed the page");
        // $message->save();

        $messages = Message::all();

        return view('messages.index', compact('messages'));
    }
}
