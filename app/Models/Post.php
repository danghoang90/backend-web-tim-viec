<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function employer(){
        return $this->belongsTo(Employer::class);
    }
    public function applyNow(){
        return $this->hasMany(Applynow::class);
    }
}
