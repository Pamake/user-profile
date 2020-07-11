<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function  index(Request $request)
    {

        if(request()->ajax())
        {
            $users = DB::table('users')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('users.id', 'users.email','user_details.first_name','user_details.last_name','users.avatar','user_details.country');
            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('image', function ($user) {
                    $url=asset('storage/'.$user->avatar);
                    return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                })->addColumn('action', function($data){
                   /* $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i>Edit</button>';*/
                    $button = '<button type="button" name="view" id="'.$data->id.'" class="view btn btn-primary btn-sm" href="' . route('detail', $data->id) . '"><i class="fas fa-folder"></i>View</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i>Delete</button>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }
        return view('admin.user_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('ajax');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }

    public function usersList()
    {
        $users = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('users.*', 'user_details.*');
        return datatables()->of($users)
            ->make(true);
    }


}
