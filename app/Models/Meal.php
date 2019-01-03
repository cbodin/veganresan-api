<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = 'meals';
    protected $dateFormat = 'U';
    protected $casts = [
        'rating' => 'int',
        'created_at' => 'int',
        'updated_at' => 'int',
    ];
    protected $visible = ['id', 'name', 'image', 'rating', 'created_at'];

}
