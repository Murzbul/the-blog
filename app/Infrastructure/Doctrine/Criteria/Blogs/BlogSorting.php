<?php

namespace App\Infrastructure\Doctrine\Criteria\Blogs;

use Lib\Criteria\Contracts\Sorting;
use Lib\Criteria\Traits\SortingTrait;

class BlogSorting implements Sorting
{
    use SortingTrait;

    public const NAME = 'name';

    protected $sortingKey = [
        self::NAME,
    ];
}
