<?php

namespace Blog\Payloads\Blogs;

interface BlogCreatePayload
{
    public function title(): string;

    public function body(): string;
}
