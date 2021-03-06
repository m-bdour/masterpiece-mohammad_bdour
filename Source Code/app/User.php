<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "users";
    public $primaryKey = 'user_id';
    public $timestamps = true;


    protected $fillable = [
        'email', 'password', 'phone', 'name', 'lname', 'image', 'coverImage', 'cv', 'title', 'nationality', 'about', 'linkedin', 'github', 'twitter', 'behance', 'portfolio', 'address', 'city',
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

    public function majors()
    {
        return $this->hasOne('App/Major');
    }
    public function applications()
    {

        return $this->hasMany(Application::class, 'User_id');
    }
}
