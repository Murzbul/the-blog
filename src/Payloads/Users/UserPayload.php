<?php

namespace Blog\Payloads\Users;

use Blog\Entities\User;

interface UserPayload
{
    public function user(): ?User;
}
