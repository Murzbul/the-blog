<?php

namespace App\Infrastructure\Doctrine\Criteria\Blogs;

use Lib\Criteria\Contracts\Filter;
use Lib\Criteria\Traits\FilterTrait;

class BlogFilter implements Filter
{
    use FilterTrait;

    const SEARCH = 'search';

    protected $filters = [
        self::SEARCH,
    ];

    public function getFields(): array
    {
        return [
            'title',
        ];
    }
}
