<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Entities\Blog;
use Blog\Payloads\Blogs\BlogStatusChangePayload;
use Blog\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Lib\Validators\UuidValidator;

class BlogStatusChangeRequest implements BlogStatusChangePayload
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
        if (! Gate::allows('isAdmin')) {
            abort(403, 'Error');
        }

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
