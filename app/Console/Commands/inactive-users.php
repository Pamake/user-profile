<?php

namespace App\Console\Commands;

use App\Notifications\NotifyInactiveUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EmailInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email inactive users';

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
       // $limit = Carbon::now();
        $data_birthday_user = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select( 'users.name','users.email', 'user_details.first_name', 'user_details.last_name', 'user_details.date_of_birth')
            ->get();

        foreach ($data_birthday_user as $user) {
            // From a date string
            $date = Carbon::createFromFormat('Y-m-d', $user->date_of_birth);
            $limit = Carbon::now();
            if($date->isBirthday($limit)){
                //pour chaque date correspondante envoyé un email
                $user->notify(new NotifyInactiveUser($user->email));
            }
        }
    }

}
