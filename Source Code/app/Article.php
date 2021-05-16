<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    public $primaryKey = 'article_id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description' , 'keywords' , 'title' , 'Ename' , 'about' , 'image' , 'cover' 
    ];
   

}
