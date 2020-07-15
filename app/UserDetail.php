<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserDetail extends Model
{

    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

                'user_id',
                'biographies',
                'job_title',
                'first_name',
                'last_name',
                'profession',
                'address',
                'city',
                'country',
                'date_of_birth',
                'child_number',
                'activities',
                'marital_status',
                'sport',
                'hobbies',
                'notes',
                'promotion',
                'filiere',
                'name_skills',
                'comments',
                'calling_code',
                'phone_number',
                'name_companies_work',
                'is_sign',
                'experiences'
    ];

    public function user() {
      return $this->belongsTo('App\User');
    }
}
