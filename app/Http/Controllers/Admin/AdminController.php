<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
class AdminController extends Controller
{



 //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserVerifyList()
    {
        $users = User::where('role', 'user')->where('is_activated',false)->get();
        return view('admin.verify_users_list',['users'=>$users]);
    }
     public function verifyUser(Request $request, $id)
        {
            $user = User::where('id',$id)->first();
            $user->is_activated=true;
            $user->save();
            flash('User has been activated ')->success();
            return redirect()->route('admin.verifyUsers');
        }

        public function rejectUser(Request $request, $id)
        {
            $user = User::where('id',$id)->first();
            $user->is_activated=false;
            $user->save();
            flash('User has been rejected ')->success();
            return redirect()->route('admin.verifyUsers');
        }
}
