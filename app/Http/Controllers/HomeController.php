<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $usersCount = $this->getAllUserCount();
         $array_birthday = $this->getAllBirthdayByMonthCount();
        // dd($array_birthday);
        $lastRecords = DB::table('users')->latest()->take(8)->get();
       $logs = [];
           foreach($lastRecords as $lastRecord){
             $date = $lastRecord->updated_at;
             $day = Carbon::parse($date)->format('d');
             $month = Carbon::parse($date)->format('F');
             $date_update = $day.' '.$month;
             $logs[] = [
                     'user' => $lastRecord,
                     'date_update' => $date_update
                   ];
           }

          // dd($logs);
        return view('back.dashboard', compact('usersCount', 'lastRecords'));
    }


     public function getAllUserCount()
    {
        $users = DB::table('users')->count();
        return $users;
    }


    public function getAllBirthdayByMonthCount()
    {
            $users = DB::table('users')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select( 'users.id', 'user_details.date_of_birth')
                ->get();
            $logs= [];
            foreach($users as $user){
              $date = $user->date_of_birth;
              $month = Carbon::parse($date)->format('F');
              $logs [] = $month;
            }
            $count = array_count_values($logs);
            // dd($count);
        return $count;
    }


    public function getBirthdaysByMonthCount($date = false)
                {
                    if (!$date) {
                        $date = Carbon::now();
                    } else {
                        $date = Carbon::createFromFormat('Y-m-d', $date);
                    }
                     $items = DB::table('users')
                                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                                ->select( 'users.id','users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.date_of_birth')
                                ->whereRaw('MONTH(user_details.date_of_birth) = ?', [$date->month])
                                ->get();
                    return $items;
                }


                 /**
                     * Display a list of the birthdays.
                     *
                     * @return array
                     */
                    public function birthdaysByMonth(Request $request)
                    {
                        $items = $this->getBirthdaysByMonthCount($request->get('date'));
                        $count = count($items);
                        return $count;
                    }

}
