<?php

namespace App\Http\Api\Handlers;

use App\Http\Api\Requests\Blogs\BlogCommentCreateRequest;
use App\Http\Api\Requests\Blogs\BlogCreateRequest;
use App\Http\Api\Requests\Blogs\BlogLikeCreateRequest;
use App\Http\Api\Requests\Blogs\BlogListRequest;
use App\Http\Api\Requests\Blogs\BlogShowRequest;
use App\Http\Api\Requests\Blogs\BlogStatusChangeRequest;
use App\Http\Api\Requests\Blogs\BlogUpdateRequest;
use App\Http\Responders\MetadataResponder as Responder;
use App\Http\Transformers\Blogs\BlogTransformer;
use App\Http\Transformers\Blogs\CommentTransformer;
use App\Http\Transformers\Blogs\LikeTransformer;
use Blog\Services\Blogs\BlogService;

class BlogHandler extends Handler
{
    /** @var Responder */
    private $responder;
    /** @var BlogService */
    private $service;

    public function __construct(BlogService $service, Responder $responder)
    {
        $this->responder = $responder;
        $this->service = $service;
    }

    public function create(BlogCreateRequest $request)
    {
        $request->validate();

        $blog = $this->service->create($request);

        return $this->responder->success($blog, new BlogTransformer())->respond();
    }

    public function list(BlogListRequest $request)
    {
        $request->validate();

        $blogs = $this->service->list($request);

        return $this->responder->success($blogs, new BlogTransformer())->paginator(adapt_paginator($blogs, $request));
    }

    public function update(BlogUpdateRequest $request)
    {
        $request->validate();

        $blog = $this->service->update($request);

        return $this->responder->success($blog, new BlogTransformer())->respond();
    }

    public function show(BlogShowRequest $request)
    {
        $request->validate();

        $blog = $this->service->show($request);

        return $this->responder->success($blog, new BlogTransformer())->respond();
    }

    public function statusChange(BlogStatusChangeRequest $request)
    {
        $request->validate();

        $blog = $this->service->statusChange($request);

        return $this->responder->success($blog, new BlogTransformer())->respond();
    }

    public function comment(BlogCommentCreateRequest $request)
    {
        $request->validate();

        $comment = $this->service->comment($request);

        return $this->responder->success($comment, new CommentTransformer())->respond();
    }

    public function like(BlogLikeCreateRequest $request)
    {
        $request->validate();

        $comment = $this->service->like($request);

        return $this->responder->success($comment, new LikeTransformer())->respond();
    }
}
