<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniMajor extends Model
{
    protected $table = "uni_majors";
    public $primaryKey = 'uni_major_id';
    public $timestamps = true;

    protected $fillable = [
        'major_id', 'university_id',
    ];

    public function majors()
    {
        return $this->belongsToMany(Major::class);
    }

    public function universities()
    {
        return $this->belongsToMany(University::class);
    }
}
