<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "applications";
    public $primaryKey = 'application_id';
    public $timestamps = true;

    protected $fillable = [
        'coverLetter', 'attachment',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
}
