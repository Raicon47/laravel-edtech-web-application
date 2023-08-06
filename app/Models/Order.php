<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'course_name',
       'price',
       'email',
       'phone',
       'country',
       'state',
       'address',
       'zip_code',
    ];

    protected $table = 'orders';

    public function user(){
        return $this->belongsTo(User::class);
    }

}
