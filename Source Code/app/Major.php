<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{

    protected $table = "majors";
    public $primaryKey = 'major_id';
    public $timestamps = true;

    protected $fillable = [
        'major', 'description' , 'keywords' , 'title' , 'Ename' , 'about' , 'sectors' , 'skills' , 'courses' , 'findJob' , 'education' , 'references' , 'image' , 'cover' , 'college_id'
    ];
   
    public function colleges()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function sstories()
    {
        return $this->hasMany(Sstory::class, 'major_id');
    }

    public function uni_majors()
    {

        return $this->hasMany(UniMajor::class, 'major_id');
    }

}
