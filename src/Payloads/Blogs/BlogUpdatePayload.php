<?php

namespace Blog\Payloads\Blogs;

interface BlogUpdatePayload extends BlogPayload
{
    public function id(): int;

    public function name(): string;
}
