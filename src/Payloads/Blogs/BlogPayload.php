<?php

namespace Blog\Payloads\Blogs;

use Blog\Entities\Blog;

interface BlogPayload
{
    public function blog(): ?Blog;
}
