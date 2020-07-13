<?php

namespace App\Console\Commands;

use App\Mail\BirthdayUserMail;
use App\Mail\ListeBirthdayUserMail;
use App\Notifications\NotifyBirthdayUser;
use App\Notifications\NotifyListBirthdayUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BirthdayUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:birthdays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily email to all users with birthday list ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $collection= collect([]);
        // Create an empty array to work with.
        $dataArray = [];
        $data = [];
        $arr = array();

        $data_birthday_user = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select( 'users.id','users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.date_of_birth')
            ->get();

        foreach ($data_birthday_user as $user) {
            // From a date string
            $date = Carbon::createFromFormat('Y-m-d', $user->date_of_birth);
            $limit = Carbon::now();

            if($date->isBirthday($limit)){
                //pour chaque date correspondante envoyé un email
                //$user->notify(new NotifyBirthdayUser());
               //dd($user);
                Mail::to($user->email)->send(new BirthdayUserMail($user));
                $collection->push($user);
                $arr = $collection->toArray();
                //$arr = array_push($arr,$temp);
            }

        }

        if($collection->isNotEmpty()) {
            $users_all = DB::table('users')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select( 'users.name','users.email', 'user_details.first_name', 'user_details.last_name')
                ->get();
            // Finding a random word

            foreach ($users_all as $user) {
                Mail::to($user->email)->send(new ListeBirthdayUserMail($arr));
                if(env('MAIL_HOST', false) == 'smtp.mailtrap.io'){
                    sleep(1); //use usleep(500000) for half a second or less
                }
            }
        }
    }
}
