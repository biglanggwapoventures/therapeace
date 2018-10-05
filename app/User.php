<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Therapist;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

<<<<<<< HEAD
    public function therapist()
    {
        return $this->hasOne('App\therapist', 'user_id', 'id');
    }

    public function client()
    {
        return $this->hasOne('App\Client', 'user_id', 'id');
=======

    public function therapist()
    {
        return $this->hasOne(Therapist::class, 'user_id');
>>>>>>> 148cb2c4ed8505dc3f1ba38179f54c1b5902d685
    }

}
