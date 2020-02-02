<?php

namespace Blog\Repositories;

use Blog\Entities\User;
use Lib\Criteria\Contracts\Criteria;

interface UserRepository extends ReadRepository
{
    const CLASS_NAME = User::class;

    public function search(Criteria $criteria);
}
