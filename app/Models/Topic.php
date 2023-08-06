<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable  = [
      'name',
      'slug'
    ];

    protected $table = 'topics';

    public function course() {
        return $this->hasMany(Course::class);
    }
}
