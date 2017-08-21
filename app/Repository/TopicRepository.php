<?php

namespace App\Repository;

use App\Topic;

class TopicRepository
{

    public function byId($id)
    {
        return Topic::find($id);
    }

    public function getTopic()
    {
        return Topic::get();
    }

    public function updateByName($old, $name)
    {
        // Update the specified topic by the name
        if (isset($name)) {
            return Topic::where('title', $old)->update(['title' => $name]);
        } else {
            abort('500', 'Update error');
        }
    }

    public function create(array $attributes)
    {
        return Topic::create($attributes);
    }
}