<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "reports";
    public $primaryKey = 'report_id';
    public $timestamps = true;

    protected $fillable = [
        'Date', 'time', 'page', 'pageLink', 'describe', 'device', 'OS', 'browser', 'version', 'else', 'email'
    ];
}
