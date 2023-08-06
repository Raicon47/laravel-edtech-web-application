<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'title',
      'video',
      'course_id'
    ];

    protected $table = 'course_modules';

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
