<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = "positions";
    public $primaryKey = 'position_id';
    public $timestamps = true;

    protected $fillable = [
        'email', 'password', 'phone', 'fname', 'lname', 'image', 'coverImage', 'cv', 'title', 'nationality', 'about', 'linkedin', 'github', 'twitter', 'behance', 'portfolio', 'address', 'city',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function applications()
    {

        return $this->hasMany(Application::class, 'Position_id');
    }
}
