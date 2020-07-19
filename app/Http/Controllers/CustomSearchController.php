<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomSearchController extends Controller
{
    function index(Request $request)
    {

    $user = $this->getAuthUser();
        if(request()->ajax())
        {
            $query = $request->get('query');
            if(!empty($request->filter_gender) && !empty($request->filter_country) && !empty($request->filter_filiere) )
            {

                $data = DB::table('users')
                    ->join('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                    ->where('user_details.gender', $request->filter_gender)
                    ->where('user_details.country', $request->filter_country)
                    ->where('user_details.filiere', $request->filter_filiere)
                    ->get();
            } else if(!empty($request->filter_country) && !empty($request->filter_filiere)){

            $data = DB::table('users')
                    ->join('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                    ->where('user_details.country', $request->filter_country)
                    ->where('user_details.filiere', $request->filter_filiere)
                    ->get();
            } else if(!empty($request->filter_gender) && !empty($request->filter_filiere)) {
            $data = DB::table('users')
                    ->join('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                    ->where('user_details.gender', $request->filter_gender)
                    ->where('user_details.filiere', $request->filter_filiere)
                    ->get();

            } else if(!empty($request->filter_country) && !empty($request->filter_gender)) {
                $data = DB::table('users')
                    ->join('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                    ->where('user_details.gender', $request->filter_gender)
                    ->where('user_details.country', $request->filter_country)
                    ->get();

            } else if(!empty($request->filter_gender)) {
                $data = DB::table('users')
                     ->join('user_details', 'users.id', '=', 'user_details.user_id')
                     ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                     ->where('user_details.gender', $request->filter_gender)
                     ->get();

             } else if(!empty($request->filter_country) ) {
              $data = DB::table('users')
                   ->join('user_details', 'users.id', '=', 'user_details.user_id')
                   ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                   ->where('user_details.country', $request->filter_country)
                   ->get();

           }else if( !empty($request->filter_filiere)) {
            $data = DB::table('users')
                 ->join('user_details', 'users.id', '=', 'user_details.user_id')
                 ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                 ->where('user_details.filiere', $request->filter_filiere)
                 ->get();

         }else if($request->has('search') && ! is_null($request->get('search')['value']) ) {
                $regex = $request->get('search')['value'];
            $data = DB::table('users')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                ->where('user_details.country','like', '%'. $regex.'%')
                ->get();

        } else if ($query != '') {
                $data = DB::table('users')
                    ->join('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country')
                    ->where('users.name', 'like', '%'.$query.'%')
                    ->orWhere('users.email', 'like', '%'.$query.'%')
                    ->orWhere('user_details.first_name', 'like', '%'.$query.'%')
                    ->orWhere('user_details.last_name', 'like', '%'.$query.'%')
                    ->orWhere('user_details.gender', 'like', '%'.$query.'%')
                    ->orWhere('user_details.filiere', 'like', '%'.$query.'%')
                    ->orWhere('user_details.city', 'like', '%'.$query.'%')
                    ->orWhere('user_details.country', 'like', '%'.$query.'%')
                    ->orderBy('users.id', 'desc')
                    ->get();
        } else {
            $data = DB::table('users')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.gender', 'user_details.filiere', 'user_details.city','user_details.country');
        }
        return datatables()->of($data)
            ->make(true);
        }
        $country_name = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.country')
            ->groupBy('user_details.country')
            ->orderBy('user_details.country', 'ASC')
            ->get();
        $filiere_name = DB::table('users')
                    ->join('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select('user_details.filiere')
                    ->groupBy('user_details.filiere')
                    ->orderBy('user_details.filiere', 'ASC')
                    ->get();

        return view('admin.custom_search', compact('country_name', 'filiere_name', 'user'));
    }


    public function getAuthUser ()
        {
            return Auth::user();
        }

}
