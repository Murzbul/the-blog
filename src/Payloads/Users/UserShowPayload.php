<?php

namespace Blog\Payloads\Users;

interface UserShowPayload extends UserPayload
{
    public function id(): string;
}
