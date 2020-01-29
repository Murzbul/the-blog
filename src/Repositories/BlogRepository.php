<?php

namespace Blog\Repositories;

use Blog\Entities\Blog;
use Lib\Criteria\Contracts\Criteria;

interface BlogRepository extends ReadRepository
{
    const CLASS_NAME = Blog::class;

    public function search(Criteria $criteria);
}
