<?php

namespace Blog\Repositories;

use Blog\Entities\Role;
use Lib\Criteria\Contracts\Criteria;

interface RoleRepository extends ReadRepository
{
    const CLASS_NAME = Role::class;

    public function search(Criteria $criteria);
}
