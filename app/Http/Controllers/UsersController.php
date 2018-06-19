<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Prefecture;
use App\Project;
use App\Entry;

class UsersController extends Controller
{
    public function profile($id)
    {

        //募集したプロジェクト
        $authProjects = DB::table('projects')->where('user_id', $id)->orderBy('id', 'desc')->get();
        $authUserId = Auth::user()->id;
        if($id == $authUserId){
            //応募したプロジェクトを取得
            $entriedProjects = DB::select(DB::raw("SELECT `projects`.`id`, `title`
                                                FROM `projects`
                                                INNER JOIN `entries` ON `entries`.`user_id` = $authUserId
                                                WHERE `entries`.`project_id` = `projects`.`id`
                                                ORDER BY `entries`.`created_at` DESC"));
        }
        $user = User::find($id);
        return view('users.profile', compact('user', 'authProjects', 'entriedProjects'));
    }

    public function edit()
    {
        $authUser = Auth::user();
        $prefectures = \App\Prefecture::orderBy('code','asc')->pluck('name', 'code');
        $prefectures = $prefectures -> prepend('選択してください', '');
        return view('users.edit', compact('authUser', 'prefectures'));
    }

    public function editComplete(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:1|max:50',
                'self_introduction' => 'min:1|max:1000',
            ]);

        if($request->id == Auth::user()->id) {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->self_introduction = $request->self_introduction;
            $user->gender = $request->gender;
            $user->birthday = $request->birthday;

            $user->save();
            return redirect('users/profile/'.Auth::user()->id);
        }
    }

    public function userInformation()
    {
        if(Auth::check()) {
            $authUser = User::find(Auth::user()->id);
            return view('users.user_information')->with('authUser', $authUser);
        }
    }

    public function userInformationComplete(Request $request)
    {
        $this->validate($request,
            [
                'user_type' => 'required',
                'last_name' => 'required',
                'first_name' => 'required',
                'last_name_kana' => 'required',
                'first_name_kana' => 'required',
                'address' => 'required',
                'birthday' => 'required',
                'gender' => 'required',
            ]);

        if($request->id == Auth::user()->id) {
            $userInformation = User::find($request->id);
            $userInformation->user_type = $request->user_type;
            $userInformation->last_name = $request->last_name;
            $userInformation->first_name = $request->first_name;
            $userInformation->last_name_kana = $request->last_name_kana;
            $userInformation->first_name_kana = $request->first_name_kana;
            $userInformation->address = $request->address;
            $userInformation->birthday = $request->birthday;
            $userInformation->gender = $request->gender;
            $userInformation->save();
            return redirect('/');
        }
    }
}
