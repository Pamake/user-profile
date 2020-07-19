<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\NotifyInactiveUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\UserDetail;

class UserController extends Controller
{

    public function getAuthUser ()
    {
        return Auth::user();
    }

     public function getAllUserCount ()
    {
        $users = DB::table('users')->count();
        return $users;
    }

     public function getAllBirthdayByMonthCount ()
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
            return $$count;
        }

    public function viewProfile() {

            $user = User::with('userDetail')->findOrFail(Auth::user()->id);
            $date = Carbon::createFromFormat('Y-m-d', $user->userDetail->date_of_birth,'Europe/Paris')->locale('fr_FR');
            $dateDisplay = $date->isoFormat('D MMMM');
           // dd($user);
      $data = [
        'user' => $user,
        'date_birthday' => $dateDisplay
      ];
      return view('admin.user.profile', $data);
    }

    /**
    * @param Request $request
    * @param  \App\User $user
    * @return \Illuminate\Http\RedirectResponse
    * @throws \Illuminate\Auth\Access\AuthorizationException
    */
    public function saveProfilePicture(Request $request, User $user) {
       //dd($request);
       // $this->authorize('update', $user);
        if($request->isMethod('post')) {
            $request->validate ([

                'job_title' => 'required|min:1|max:75',
                'profession' => 'required|max:75',
                'first_name'  => 'required|min:3|max:50',
                'last_name'  => 'required|min:3|max:50',
                'marital_status' =>'required',
                'child_number' =>'required',
                'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
                'promotion' => 'required',
                'filiere' => 'required',
                'gender' =>'required',
                'date_of_birth'  => 'required|date',
                'notes'  => 'max:250',
                'sport'  => 'max:50',
                'activities'  => 'max:50',
                'hobbies'  => 'max:50',
                'experiences' => 'required|max:250',
                'name_skills' => "required|max:100",
                'calling_code' => 'required',
                'phone_number' => 'required',
                'city'  => 'max:50',
                'country'  => 'max:60',
                'is_sign' => 'required',

            ],
                [
                ]);

            $data = [
                'job_title' => $request->job_title,
                'profession' => $request->profession,
                'first_name'  => $request->first_name,
                'last_name'  => $request->last_name,
                'marital_status' => $request->marital_status,
                'child_number' =>$request->child_number,
                'promotion' => $request->promotion,
                'filiere' => $request->filiere,
                'gender' =>$request->gender,
                'date_of_birth'  => $request->date_of_birth,
                'notes'  => $request->notes,
                'sport'  =>$request->sport,
                'activities'  => $request->activities,
                'hobbies'  => $request->hobbies,
                'experiences' => $request->experiences,
                'name_skills' => $request->name_skills,
                'calling_code' => $request->calling_code,
                'phone_number' => $request->phone_number,
                'city'  => $request->city,
                'country'  => $request->country,
                'is_sign' => $request->is_sign,
            ];

              $data1 = [

                            'email' => $request->email,
                            'name' => $request->first_name,
                        ];
            $model = User::findOrFail(Auth::user()->id);
            $model->userDetail->fill($data)->save();
            $model->fill($data1)->save();

            return redirect()->route('admin.profile')->with(['message' => 'Votre profile a été mise à jour avec succés.']);
        }else{
            return redirect()->route('admin.profile')->with(['error' => 'Votre profile a pas été mise à jour.']);
        }


    }


    public function updateprofile2(Request $request, $id){
        $this->validate($request,[
            'job_title' => 'required|min:1|max:75',
            'profession' => 'required|max:75',
            'first_name'  => 'required|min:3|max:50|string',
            'last_name'  => 'required|min:3|max:50|string',
            'marital_status' =>'required',
            'child_number' =>'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'promotion' => 'required',
            'filiere' => 'required',
            'gender' =>'required',
            'date_of_birth'  => 'required|date',
            'notes'  => 'max:200|string',
            'sport'  => 'max:50|string',
            'extra'  => 'max:30|string',
            'hobbies'  => 'max:50|string',
            'inputExperience' => 'required|max:75|string',
            'inputSkills' => "required|max:75|string",
            'calling_code' => 'required',
            'phone_number' => 'required',
            'city'  => 'max:50|string',
            'country'  => 'max:50|string',
            'checkbox' => 'required',

        ]);
        $input_data=$request->all();
        DB::table('users')->where('id',$id)->update(['name'=>$input_data['name'],
            'email'=>$input_data['email']]);
        DB::table('user_details')->where('user_id',$id)->update(['title'=>$input_data['job_title'],
            'profession'=>$input_data['profession'],
            'first_name'=>$input_data['first_name'],
            'last_name'=>$input_data['last_name'],
            'marital_status'=>$input_data['marital_status'],
            'child_number'=>$input_data['child_number'],
            'promotion'=>$input_data['promotion'],
            'filiere'=>$input_data['filiere'],
            'gender'=>$input_data['gender'],
            'date_of_birth'=>$input_data['date_of_birth'],
            'notes'=>$input_data['notes'],
            'sport'=>$input_data['sport'],
            'extra'=>$input_data['extra'],
            'hobbies'=>$input_data['hobbies'],
            'inputExperience'=>$input_data['inputExperience'],
            'inputSkills'=>$input_data['inputSkills'],
            'calling_code'=>$input_data['calling_code'],
            'phone_number'=>$input_data['phone_number'],
            'city'=>$input_data['city'],
            'country'=>$input_data['country'],
            'checkbox'=>$input_data['checkbox']]);
        return back()->with('message','Update Profile already!');

    }

    public function viewContact() {
       // $data = User::with('userDetail')->get();
       // dd($data);

        $data = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('users.*', 'user_details.*')
            ->orderBy('user_details.last_name', 'asc')
            ->paginate(9);
        //dd($data);
        return view('admin.user.contact', ['data'=>$data]);
    }


    public function detailProfile($id)
    {
        $user = User::with('userDetail')->findOrFail($id);
        $date = Carbon::createFromFormat('Y-m-d', $user->userDetail->date_of_birth,'Europe/Paris')->locale('fr_FR');
        $dateDisplay = $date->isoFormat('D MMMM');
        $user->userDetail->date_of_birth = $dateDisplay;

        return view('admin.user.profiledetail', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->userDetail()->sync($request->input('userDetail', []));

        return redirect()->route('admin.users.index');
    }


      public function updateUser(ProfileRequest $request, $id)
        {
            $user = User::findOrFail($id);
            $user->update($request->all());
           return redirect()->route('admin.profile')->with(['message' => 'Profile updated successfully']);
        }

        public function getBirthdays($date = false)
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

                $events = [];
                foreach ($items as $key => $value) {
                    $birthday = Carbon::createFromFormat('Y-m-d', $value->date_of_birth);
                    $events[]= [
                        'title' => $value->first_name.' '.$value->last_name,
                        'start' => Carbon::createFromDate(null, $birthday->month, $birthday->day)->format('Y-m-d')
                    ];
                }

                return $events;
            }


             /**
                 * Display a list of the birthdays.
                 *
                 * @return array
                 */
                public function birthdays(Request $request)
                {
                    $items = $this->getBirthdays($request->get('date'));
                    return $items;
                }



                /**
                     * Display a listing of the resource.
                     *
                     * @return \Illuminate\Http\Response
                     */
                    public function index()
                    {
                        return view('admin.birthdays');
                    }

}
