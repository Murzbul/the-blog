<?php

namespace App\Infrastructure\Doctrine\Repositories;

use Blog\Entities\Like;
use Blog\Repositories\LikeRepository;

class DoctrineLikeRepository extends DoctrineReadRepository implements LikeRepository
{
    public function getEntity()
    {
        return Like::class;
    }
}
