<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Prefecture;

class UsersController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        $userPrefecture = Prefecture::where('code', $user->livein)->first();
        return view('users.profile', compact('user', 'userPrefecture'));
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
                'self_introduction' => 'min:30|max:1000',
            ]);

        if($request->id == Auth::user()->id) {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->self_introduction = $request->self_introduction;
            $user->gender = $request->gender;
            $user->livein = $request->livein;
            $user->birthday = $request->birthday;

            $user->save();
            return redirect('users/profile/'.Auth::user()->id);
        }
    }
}
