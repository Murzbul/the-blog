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
    private $repository;
    /** @var BlogRepository */
    private $itemRepository;

    public function __construct(PersistRepository $repository, BlogRepository $itemRepository)
    {
        $this->repository = $repository;
        $this->itemRepository = $itemRepository;
    }

    public function create(BlogCreatePayload $payload): Blog
    {
        $title = $payload->title();
        $body = $payload->body();

        $blog = new Blog($title, $body);
        $this->repository->save($blog);

        return $blog;
    }

    public function update(BlogUpdatePayload $payload): Blog
    {
        $blog = $payload->blog();

        $blog->update($payload);
        $this->repository->save($blog);

        return $blog;
    }

    public function list(Criteria $criteria): Paginator
    {
        $blogs = $this->itemRepository->search($criteria);

        return $blogs;
    }

    public function show(BlogShowPayload $payload): Blog
    {
        $blog = $payload->blog();

        return $blog;
    }
}
