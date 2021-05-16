<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VsMajor extends Model
{
    protected $table = "vs_majors";
    public $primaryKey = 'vsMajor_id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description' , 'keywords' , 'title' , 'Ename' , 'about' , 'image' , 'cover' 
    ];
   

}
