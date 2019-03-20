<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;

class MailsController extends Controller
{

    public function index()
    {
        $mails = Mail::all();

        return view('mails.index', compact('mails'));
    }

    public function create()
    {
        return view('mails.create');
    }

    public function store()
    {
        $attributes = $this->validateMail();

        $mail = Mail::create($attributes);

        return redirect('/mails');
    }

    public function show(Mail $mail)
    {
        return view('mails.show', compact('mail'));
    }

    protected function validateMail()
      {
         return request()->validate([
            'subject' => ['required', 'min:3', 'max:191'],
            'body' => ['required', 'min:3']
         ]);
      }
}
