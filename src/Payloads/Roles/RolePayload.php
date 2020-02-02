<?php

namespace Blog\Payloads\Roles;

use Blog\Entities\Role;

interface RolePayload
{
    public function role(): ?Role;
}
