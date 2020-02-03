<?php

namespace Blog\Repositories;

use Blog\Entities\Like;
use Lib\Criteria\Contracts\Criteria;

interface LikeRepository extends ReadRepository
{
    const CLASS_NAME = Like::class;
}
