<?php

namespace Blog\Payloads\Roles;

interface RoleCreatePayload
{
    public function name(): string;

    public function slug(): string;
}
