<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Entities\Blog;
use Blog\Payloads\Blogs\BlogShowPayload;
use Blog\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogShowRequest implements BlogShowPayload
{
    const ID = 'blogId';

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

    public function id(): string
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
        return $this->request->validate([]);
    }
}
