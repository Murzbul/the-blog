<?php

namespace Blog\Payloads\Blogs;

use Blog\Entities\User;

interface BlogLikeCreatePayload extends BlogPayload
{
    public function user(): User;
}
