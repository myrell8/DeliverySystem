<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminsController extends Controller
{
    public function index()
    {
        $users = User::all()->sortByDesc('created_at');

        return view('users.index', compact('users'));
    }
}
