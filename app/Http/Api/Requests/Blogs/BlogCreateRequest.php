<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Payloads\Blogs\BlogCreatePayload;
use Illuminate\Http\Request;

class BlogCreateRequest implements BlogCreatePayload
{
    const NAME = 'name';

    /** @var Request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function name(): string
    {
        return $this->request->get(self::NAME);
    }

    public function validate()
    {
        return $this->request->validate([
            static::NAME => 'required|max:20',
        ]);
    }
}
