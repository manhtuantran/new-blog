<?php


namespace App\Repositories;


use App\Interfaces\PostInterface;
use App\Models\Post;

class PostRepository extends EloquentRepository implements PostInterface
{
    public function getModel()
    {
        return Post::class;
    }
}
