<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sstory extends Model
{

    protected $table = "sstories";
    public $primaryKey = 'sstory_id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description' , 'keywords' , 'title' , 'Ename' , 'about' , 'image' , 'cover' , 'major_id'
    ];


    public function majors()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
