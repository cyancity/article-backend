<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['topic', 'url'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
