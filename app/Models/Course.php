<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
     'name',
     'price',
     'course_image'
    ];

    protected $table = 'courses';

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

}
