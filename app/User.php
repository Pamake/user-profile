<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ACTIVE = 1;
    const INACTIVE = 0;
    const USER_ROLE_ADMIN = 'admin';
    const USER_ROLE_USER = 'user';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'role', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetail() {
      return $this->hasOne('App\UserDetail');
    }

    public function activationUser()
    {
        return $this->hasOne('App\ActivationUser');
    }

  public function isAdmin(){
        return $this->role == 'admin';
    }

    public function isPatient(){
        return $this->role == 'user';
    }

     public function hasRole($roles){
            return in_array($this->role, $roles);
        }
}
