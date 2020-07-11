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

    public function viewProfile() {

            $user = User::with('userDetail')->findOrFail(Auth::user()->id);
            $date = Carbon::createFromFormat('Y-m-d', $user->userDetail->date_of_birth,'Europe/Paris')->locale('fr_FR');
            $dateDisplay = $date->isoFormat('D MMMM');
      $data = [
        'user' => Auth::user(),
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
                'notes'  => 'max:200',
                'sport'  => 'max:50',
                'activities'  => 'max:30',
                'hobbies'  => 'max:50',
                'experiences' => 'required|max:75',
                'name_skills' => "required|max:75",
                'calling_code' => 'required',
                'phone_number' => 'required',
                'city'  => 'max:50',
                'country'  => 'max:50',
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
                'email' => $request->email,
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
           /* $user = User::findOrFail(Auth::user()->id);
            $user->email = $request->email;
            $userDetail = new UserDetail();
            $userDetail->job_title = $request->job_title;
            $userDetail->profession = $request->profession;
            $userDetail->first_name = $request->first_name;
            $userDetail->last_name = $request->last_name;
            $userDetail->marital_status =$request->marital_status;
            $userDetail->child_number =$request->child_number;
            $userDetail->promotion = $request->promotion;
            $userDetail->filiere = $request->filiere;
            $userDetail->gender = $request->gender;
            $userDetail->date_of_birth = $request->date_of_birth;
            $userDetail->notes = $request->notes;
            $userDetail->sport = $request->sport;
            $userDetail->activities = $request->activities;
            $userDetail->hobbies = $request->hobbies;
            $userDetail->experiences = $request->experiences;
            $userDetail->name_skills = $request->name_skills;
            $userDetail->calling_code = $request->calling_code;
            $userDetail->phone_number = $request->phone_number;
            $userDetail->city = $request->city;
            $userDetail->country = $request->country;
            $userDetail->is_sign = $request->is_sign;
           // $userDetail->fill($data);
            $user->userDetail()->fill($data)->save();
            $user->save(); */

            $input_data=$request->all();
                    DB::table('users')->where('id',Auth::user()->id)->update(['email'=>$input_data['email']]);
                    DB::table('user_details')->where('user_id',Auth::user()->id)->update(['job_title'=>$input_data['job_title'],
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
                        'activities'=>$input_data['activities'],
                        'hobbies'=>$input_data['hobbies'],
                        'experiences'=>$input_data['experiences'],
                        'name_skills'=>$input_data['name_skills'],
                        'calling_code'=>$input_data['calling_code'],
                        'phone_number'=>$input_data['phone_number'],
                        'city'=>$input_data['city'],
                        'country'=>$input_data['country'],
                        'is_sign'=>$input_data['is_sign']]);
            return redirect()->route('admin.profile')->with(['message' => 'Profile updated successfully']);
        }else{
            return redirect()->route('admin.profile')->with(['error' => 'Profile updated error']);
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

   /**public function updateProfileDetail(Request $request)
    {
        if (Auth::user()->verified == 'verified') {
            flash('جهت بروز رسانی اطلاعات از طریق سیستم پشتیبانی و ارسال تیکت اقدام فرمایید.')->warning();
            return redirect()->route('profile');
        } else {
            Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                'mobile' => 'required|numeric|unique:users,mobile,' . Auth::user()->id,
                'name' => 'required|string'
            ])->validate();
            $user = User::findOrFail(Auth::user()->id);
            //$user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
            flash('اطلاعات کاربری با موفقیت ویرایش شد.')->success();
            return redirect()->route('profile');
        }
    }

    public function updateInformation(Request $request)
    {
        if (Auth::user()->verified == 'verified') {
            flash('جهت بروز رسانی اطلاعات از طریق سیستم پشتیبانی و ارسال تیکت اقدام فرمایید.')->warning();
            return redirect()->route('profile');
        } else {
            Validator::make($request->all(), [
                'national_code' => 'required||numeric|unique:users,national_code,' . Auth::user()->id,
                'birth_certificate_code' => 'required|numeric',
                'phone' => 'required|numeric',
                'zip_code' => 'required|numeric',
                'address' => 'required|string',
                'gender' => 'required|string',
            ])->validate();
            $user = User::findOrFail(Auth::user()->id);
            $user->national_code = $request->national_code;
            $user->birth_certificate_code = $request->birth_certificate_code;
            $user->zip_code = $request->zip_code;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city_id = $request->city_id;
            $user->province_id = $request->province_id;
            $user->save();
            flash('اطلاعات تکمیلی با موفقیت بروز شد.')->success();
            return redirect()->route('profile');
        }
    } */

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
