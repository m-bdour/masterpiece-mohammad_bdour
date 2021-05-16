<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = "colleges";
    public $primaryKey = 'college_id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description' , 'keywords' , 'title' , 'Ename' , 'about' , 'image' , 'cover' 
    ];

    public function majors()
    {
        return $this->hasMany(Major::class, 'college_id');
    }
}
