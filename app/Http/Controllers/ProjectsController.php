<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index');
    }

    public function gettingStarted()
    {
        return view('projects.getting_started');
    }

    public function form()
    {
        if(Auth::check()) {
            $authUser = User::find(Auth::user()->id);
            if(isset($authUser->user_type)) {
                return view('projects.form');
            } else {
                return redirect('/users/user_information')->with('authUser', $authUser);
            }
        } else {
            return redirect('/login');
        }

    }
}