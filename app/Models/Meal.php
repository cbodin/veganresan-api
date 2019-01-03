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
    protected $visible = ['id', 'name', 'image_url', 'rating', 'links', 'created_at'];
    protected $fillable = ['name', 'image', 'rating', 'links'];
    protected $appends = ['image_url'];

    public function links()
    {
        return $this->hasMany('App\Models\Link');
    }

    public function getImageUrlAttribute()
    {
        return url($this->image);
    }
}
