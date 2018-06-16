<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Project;
use App\Entry;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')->limit(3)->orderBy('id', 'desc')->get();
        return view('projects.index')->with('projects', $projects);
    }

    public function gettingStarted()
    {
        return view('projects.getting_started');
    }

    public function detail($id)
    {
        $project = Project::find($id);
        $authUserId = Auth::user()->id;
        $alreadyEntried = DB::table('entries')->where('user_id', $authUserId)->where('project_id', $project->id)->select('id')->orderBy('id', 'desc')->get();
        return view('projects.detail', compact('project', 'alreadyEntried'));
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

    public function formComplete(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|min:10',
                //main_imageは後ほど実装する
                //'main_image' => 'required',
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

    public function entry($id)
    {
        $project = Project::find($id);
        $user = Auth::user();
        return view('projects.entry', compact('project', 'user'));
    }

    public function entryComplete(Request $request)
    {
        $entry = new Entry;
        $entry->project_id = $request->id;
        $entry->user_id = Auth::user()->id;
        $entry->message = $request->message;
        $entry->save();
        return redirect('/');
    }
}