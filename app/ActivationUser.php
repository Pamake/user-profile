<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ActivationUser extends Model
{
    protected $table = 'user_activations';

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['user_id','token','created_at'];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
