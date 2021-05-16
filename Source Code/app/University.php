<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    protected $table = "universities";
    public $primaryKey = 'university_id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description' , 'keywords' , 'title' , 'Ename' , 'about' , 'image' , 'cover' 
    ];

    public function uni_majors()
    {

        return $this->hasMany(UniMajor::class, 'university_id');
    }

}
