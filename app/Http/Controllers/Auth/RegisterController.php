<?php

namespace App\Http\Controllers\Auth;

use App\ActivationUser;
use App\Mail\VerifyMail;
use App\Notifications\UserActivate;
use App\User;
use App\Http\Controllers\Controller;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            //'password' => Hash::make($data['password']),
            'password' => bcrypt($data['password']),
        ]);
        $verifyUser = ActivationUser::create([
            'user_id' => $user->id,
            'token' => Str::random(40). time(),
        ]);
        $userDetail = UserDetail::create([
            'user_id' => $user->id,
            'first_name' =>  $data['name'],
        ]);

         $emailCc = config('app.mail_to_cc_admin');
         $emailTo = config('app.mail_to_admin');
         $username = config('app.username_admin');
        \Mail::to($emailTo, $username)->cc($emailCc)->send(new VerifyMail($user));
        $user->notify(new UserActivate($user));

        return $user;
    }
    /**
    * @param $token
    */
    public function verifyUser($token)
    {
        $verifyUser = ActivationUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->is_activated = 1;
                $verifyUser->user->save();
                $status = "Votre e-mail est vérifié. Vous pouvez maintenant vous connecter.";
            } else {
                $status = "Votre e-mail est déjà vérifié. Vous pouvez maintenant vous connecter.";
            }
        } else {
            return redirect('/login')->with('warning', "Désolé, votre email n'a pas pu être identifié.");
        }
        return redirect('/login')->with('status', $status);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'Nous vous avons envoyé un code d\'activation. Vérifiez votre e-mail et cliquez sur le lien pour le vérifier.');
    }

    /**
     * @param $token
     */
    public function activate($token = null)
    {

        $activationUser = ActivationUser::with('user')->where('token', $token)->first();


        if (empty($activationUser)) {
            return redirect()->to('/')
                ->with(['error' => 'Votre code d\'activation est expiré ou invalid.']);
        }


        //$user->update(['token' => null]);
        $activationUser->update(['token' => null]);
        $activationUser->user->update(['active' => User::ACTIVE]);

        return redirect()->route('login')
            ->with(['status' => 'Félicitation! votre compte est maitenant activé.']);
    }


      public function sendActivationCode($user)
        {
            $user_activation = ($user->activationUser==null)? new ActivationUser: $user->activationUser;
            $activation_code = rand(100000, 999999);
            $user_activation->user_id = $user->id;
            $user_activation->token = $activation_code;
            $user_activation->save();

          $array=['name' => $user->first_name, 'token' => $activation_code];
          \Mail::to($user->email)->queue(new VerifyMail($array));
         }
}
