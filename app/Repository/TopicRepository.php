<?php

namespace App\Repository;

use App\Category;

class TopicRepository
{

    public function byId($id)
    {
        return Category::find($id);
    }
}