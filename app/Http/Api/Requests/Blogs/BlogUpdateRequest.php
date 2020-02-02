<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Entities\Blog;
use Blog\Payloads\Blogs\BlogUpdatePayload;
use Blog\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Lib\Validators\UuidValidator;

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

        return $this->request->validate([
            static::TITLE => 'required|max:20',
            static::BODY => 'required|max:500',
        ]);
    }
}
