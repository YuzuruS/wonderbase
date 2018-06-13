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

    public function storeProject(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|min:10',
                'main_image' => 'required',
                'summary' => 'required',
                'category' => 'required',
                'occupation' => 'required',
                'description' => 'required',
            ]);
        $projects = new Project;
        $projects->user_id = Auth::user()->id;
        $projects->title = $request->title;
        $projects->main_image = $request->main_image;
        $projects->summary = $request->title;
        $projects->category = $request->title;
        $projects->occupation = $request->title;
        $projects->description = $request->title;
        $projects->is_published = false;
        $projects->save();
        return redirect('/');
    }
}