<?php

use App\UserDetail;
use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $user0 =User::create([
            'name' => $faker->userName,
            'email' => $faker->unique()->safeEmail,
            'role' => 'user',
            'password' => bcrypt('admin'),
            'email_verified_at' => Carbon::now(),
            'active'                         => '1',
            //'avatar' => 'https://www.gravatar.com/avatar/' . md5($faker->unique()->safeEmail),
        ]);
        $userdetail0 = UserDetail::create([

                                       'job_title'  =>  $faker->jobTitle,
                                       'first_name'  =>  $faker->firstName,
                                       'last_name'  => $faker->lastName,
                                       'profession'  =>  $faker->jobTitle,
                                       'address'  =>  $faker->streetAddress,
                                       'city'  =>  $faker->city,
                                       'country'  =>  $faker->country,
                                       'date_of_birth'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                                       'child_number'  => $faker->randomDigit ,
                                       'activities'  =>  $faker->sentence($nbWords = 2, $variableNbWords = true),
                                       'marital_status'  => $faker->randomElement(['Marié(e)','Célibataire', 'Veuf/Veuve']),
                                       'sport'  => $faker->sentence($nbWords = 3, $variableNbWords = true),
                                       'hobbies'  =>  $faker->sentence($nbWords = 3, $variableNbWords = true),
                                       'promotion' =>  $faker->year($max = 'now'),
                                       'filiere' =>  $faker->randomElement(['Gestion des Banques','BTS','Gestion des entreprises', 'Gestion commerciale', 'Informatique de Gestion', 'Statistiques']),
                                       'phone_number'=> $faker->tollFreePhoneNumber,
                                       'name_companies_work'=> $faker->company,
                                       'comments'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                                       'experiences' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                                       'name_skills'=>$faker->sentence($nbWords = 2, $variableNbWords = true),
                                       'gender' => $faker->randomElement(['Homme','Femme', 'Autres']),
                                       'biographies' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                                       'user_id' => $user0->id
                                   ]);

                    $userdetail0->save();
                    $user0->userDetail()->save($userdetail0);
                    $user0->save();

        // Seed test admin
        $seededAdminEmail = 'admin@admin.com';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name'                           => $faker->userName,
                'email'                          => $seededAdminEmail,
                'role'                           => 'admin',
                'password'                       => bcrypt('admin'),
                'email_verified_at'              => Carbon::now(),
                'active'                         => '1',
              //  'avatar' => 'https://www.gravatar.com/avatar/' . md5($faker->unique()->safeEmail).'.jpg',
            ]);

            $userdetail = UserDetail::create([

                               'job_title'  =>  $faker->jobTitle,
                               'first_name'  =>  $faker->firstName,
                               'last_name'  => $faker->lastName,
                               'profession'  =>  $faker->jobTitle,
                               'address'  =>  $faker->streetAddress,
                               'city'  =>  $faker->city,
                               'country'  =>  $faker->country,
                               'date_of_birth'  => $faker->date($format = 'Y-m-d', $max = 'now'),
                               'child_number'  => $faker->randomDigit ,
                               'activities'  =>  $faker->sentence($nbWords = 2, $variableNbWords = true),
                               'marital_status'  => $faker->randomElement(['Marié(e)','Célibataire', 'Veuf/Veuve']),
                               'sport'  => $faker->sentence($nbWords = 3, $variableNbWords = true),
                               'hobbies'  =>  $faker->sentence($nbWords = 3, $variableNbWords = true),
                               'promotion' =>  $faker->year($max = 'now'),
                               'filiere' =>  $faker->randomElement(['Gestion des Banques','BTS','Gestion des entreprises', 'Gestion commerciale', 'Informatique de Gestion', 'Statistiques']),
                               'phone_number'=> $faker->tollFreePhoneNumber,
                               'name_companies_work'=> $faker->company,
                               'comments'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                               'experiences' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                               'name_skills'=>$faker->sentence($nbWords = 2, $variableNbWords = true),
                               'gender' => $faker->randomElement(['Homme','Femme', 'Autres']),
                               'biographies' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                               'user_id' => $user->id
                           ]);

            $userdetail->save();
            $user->userDetail()->save($userdetail);
            $user->save();


        }
        // Seed test user

        factory(App\User::class, 30)->create()->each(function ($user) {
            $user->activationUser()->save(factory(App\ActivationUser::class)->make());
            $user->userDetail()->save(factory(App\UserDetail::class)->make());
            $user->save();
        });


    }
}
