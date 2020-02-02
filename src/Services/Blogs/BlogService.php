<?php

namespace Blog\Services\Blogs;

use Blog\Entities\Blog;
use Blog\Payloads\Blogs\BlogCreatePayload;
use Blog\Payloads\Blogs\BlogShowPayload;
use Blog\Payloads\Blogs\BlogUpdatePayload;
use Blog\Repositories\BlogRepository;
use Blog\Repositories\PersistRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Lib\Criteria\Contracts\Criteria;

class BlogService
{
    /** @var PersistRepository */
    private $persistRepository;
    /** @var BlogRepository */
    private $repository;

    public function __construct(PersistRepository $persistRepository, BlogRepository $repository)
    {
        $this->persistRepository = $persistRepository;
        $this->repository = $repository;
    }

    public function create(BlogCreatePayload $payload): Blog
    {
        $title = $payload->title();
        $body = $payload->body();

        $blog = new Blog($title, $body);
        $this->persistRepository->save($blog);

        return $blog;
    }

    public function update(BlogUpdatePayload $payload): Blog
    {
        $blog = $payload->blog();

        $blog->update($payload);
        $this->persistRepository->save($blog);

        return $blog;
    }

    public function list(Criteria $criteria): Paginator
    {
        $blogs = $this->repository->search($criteria);

        return $blogs;
    }

    public function show(BlogShowPayload $payload): Blog
    {
        $blog = $payload->blog();

        return $blog;
    }
}
