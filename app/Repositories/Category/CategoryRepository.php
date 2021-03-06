<?php


namespace App\Repositories\Category;


use App\Models\Category;
use App\Repositories\Repository;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

}
