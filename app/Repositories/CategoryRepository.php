<?php


namespace App\Repositories;


use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository extends EloquentRepository implements CategoryInterface
{
    public function getModel()
    {
        return Category::class;
    }
}
