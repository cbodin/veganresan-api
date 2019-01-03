<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $visible = ['title', 'url'];
    public $timestamps = false;

    public function meal()
    {
        return $this->belongsTo('App\Models\Meal');
    }
}
