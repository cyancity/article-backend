<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
