<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Entities\Blog;
use Blog\Payloads\Blogs\BlogUpdatePayload;
use Blog\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogUpdateRequest implements BlogUpdatePayload
{
    const ID = 'blogId';
    const NAME = 'name';

    /** @var Request */
    private $request;
    /** @var BlogRepository */
    private $repository;
    /** @var Blog */
    private $blog;

    public function __construct(Request $request, BlogRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    public function name(): string
    {
        return $this->request->get(self::NAME);
    }

    public function id(): int
    {
        return $this->request->route()->parameter(self::ID);
    }

    public function blog(): Blog
    {
        $this->blog = $this->repository->get($this->id());

        return $this->blog;
    }

    public function validate()
    {
        return $this->request->validate([
            static::NAME => 'required|max:20',
        ]);
    }
}
