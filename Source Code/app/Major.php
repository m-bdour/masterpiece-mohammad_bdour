<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{

    protected $table = "majors";
    public $primaryKey = 'major_id';
    public $timestamps = true;

    protected $fillable = [
        'major_name',
    ];
}
