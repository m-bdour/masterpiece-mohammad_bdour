<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniLife extends Model
{
    protected $table = "uni_lives";
    public $primaryKey = 'uniLife_id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'link' 
    ];
   

}
