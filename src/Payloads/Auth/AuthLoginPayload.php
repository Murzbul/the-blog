<?php

namespace Blog\Payloads\Auth;

interface AuthLoginPayload
{
    public function email(): string;

    public function password(): string;
}
