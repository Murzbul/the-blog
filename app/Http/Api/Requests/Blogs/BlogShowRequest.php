<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Entities\Blog;
use Blog\Payloads\Blogs\BlogShowPayload;
use Blog\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Lib\Validators\UuidValidator;

class BlogShowRequest implements BlogShowPayload
{
    const ID = 'blogId';

    /** @var Request */
    private $request;
    /** @var BlogRepository */
    private $repository;
    /** @var Blog */
    private $blog;
    /** @var UuidValidator */
    private $uuidValidator;
    /** @var string */
    private $id;

    public function __construct(Request $request, BlogRepository $repository, UuidValidator $uuidValidator)
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->uuidValidator = $uuidValidator;
        $this->id = $this->request->route()->parameter(self::ID);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function blog(): Blog
    {
        $this->blog = $this->repository->get($this->id());

        return $this->blog;
    }

    public function validate()
    {
        $this->uuidValidator->validate($this->id);

        return $this->request->validate([]);
    }
}
