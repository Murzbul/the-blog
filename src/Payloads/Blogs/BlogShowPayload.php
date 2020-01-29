<?php

namespace Blog\Payloads\Blogs;

interface BlogShowPayload extends BlogPayload
{
    public function id(): int;
}
