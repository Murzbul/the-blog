<?php

namespace Blog\Repositories;

use Blog\Entities\Like;

interface LikeRepository extends ReadRepository
{
    const CLASS_NAME = Like::class;
}
