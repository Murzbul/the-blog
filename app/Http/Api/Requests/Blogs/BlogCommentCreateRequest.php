<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Entities\Blog;
use Blog\Entities\User;
use Blog\Payloads\Blogs\BlogCommentCreatePayload;
use Blog\Repositories\BlogRepository;
use Blog\Repositories\UserRepository;
use Illuminate\Http\Request;
use Lib\Validators\UuidValidator;

class BlogCommentCreateRequest implements BlogCommentCreatePayload
{
    const ID = 'blogId';
    const MESSAGE = 'message';
    const USER = 'userId';

    /** @var Request */
    private $request;
    /** @var BlogRepository */
    private $blogRepository;
    /** @var UserRepository */
    private $userRepository;
    /** @var UuidValidator */
    private $uuidValidator;
    /** @var string */
    private $id;

    public function __construct(Request $request,
                                BlogRepository $blogRepository,
                                UserRepository $userRepository,
                                UuidValidator $uuidValidator
    ) {
        $this->request = $request;
        $this->blogRepository = $blogRepository;
        $this->userRepository = $userRepository;
        $this->uuidValidator = $uuidValidator;
        $this->id = $this->request->route()->parameter(self::ID);
    }

    public function message(): string
    {
        return $this->request->get(self::MESSAGE);
    }

    public function user(): User
    {
        $userId = $this->request->get(self::USER);

        /** @var User $user */
        $user = $this->userRepository->get($userId);

        return $user;
    }

    public function blog(): Blog
    {
        /** @var Blog $blog */
        $blog = $this->blogRepository->get($this->id);

        return $blog;
    }

    public function validate()
    {
        $this->uuidValidator->validate($this->id);

        return $this->request->validate([
            static::MESSAGE => 'required|max:250',
            static::USER => 'required|uuid',
        ]);
    }
}
