<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Entities\Blog;
use Blog\Payloads\Blogs\BlogUpdatePayload;
use Blog\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogUpdateRequest implements BlogUpdatePayload
{
    const ID = 'blogId';
    const TITLE = 'title';
    const BODY = 'body';

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

    public function title(): string
    {
        return $this->request->get(self::TITLE);
    }

    public function body(): string
    {
        return $this->request->get(self::BODY);
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
        return $this->request->validate([
            static::TITLE => 'required|max:20',
            static::BODY => 'required|max:500',
        ]);
    }
}
