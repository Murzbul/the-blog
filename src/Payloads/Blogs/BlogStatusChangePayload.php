<?php

namespace Blog\Payloads\Blogs;

interface BlogStatusChangePayload extends BlogPayload
{
    public function id(): string;

    public function status(): bool;
}
