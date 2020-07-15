<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{


    public function getAuthUser ()
    {
            return Auth::user();
     }

 //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserVerifyList()
    {
        $user = $this->getAuthUser();
        $users = User::where('role', 'user')->where('is_activated',false)->get();
        return view('admin.verify_users_list',['users'=>$users, 'user' => $user]);
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
