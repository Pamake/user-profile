
<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;


$factory->define(App\UserDetail::class, function (Faker $faker) {
        return [

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
            'is_sign' => $faker->boolean,

        ];
});

