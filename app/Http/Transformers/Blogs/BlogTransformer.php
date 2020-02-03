<?php

namespace App\Http\Transformers\Blogs;

use App\Http\Transformers\Defaults\TimestampableTransformer;
use Blog\Entities\Blog;
use Flugg\Responder\Transformers\Transformer;

class BlogTransformer extends Transformer
{
    protected $load = [
        'dateTime' => TimestampableTransformer::class,
        'comments' => CommentTransformer::class,
    ];

    public function transform(Blog $blog)
    {
        return array_convert_nulls_to_empty([
            'id' => $blog->getId(),
            'title' => $blog->getTitle(),
            'body' => $blog->getBody(),
            'status' => $blog->getStatus(),
            'likes' => $blog->getLikes()->count(),
        ]);
    }

    public function includeDateTime(Blog $blog)
    {
        return $blog;
    }

    public function includeComments(Blog $blog)
    {
        return $blog->getComments()->getValues();
    }
}
