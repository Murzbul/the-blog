<?php

namespace Blog\Payloads\Blogs;

interface BlogUpdatePayload extends BlogPayload
{
    public function id(): string;

    public function title(): string;

    public function body(): string;
}
