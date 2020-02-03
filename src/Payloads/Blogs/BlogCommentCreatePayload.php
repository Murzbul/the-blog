<?php

namespace Blog\Payloads\Blogs;

use Blog\Entities\User;

interface BlogCommentCreatePayload extends BlogPayload
{
    public function message(): string;

    public function user(): User;
}
