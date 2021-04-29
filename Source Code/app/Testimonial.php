<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = "testimonials";
    public $primaryKey = 'testimonial_id';
    public $timestamps = true;

    protected $fillable = [
        'text',
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
}
