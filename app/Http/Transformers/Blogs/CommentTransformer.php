<?php

namespace App\Http\Transformers\Blogs;

use App\Http\Transformers\Defaults\TimestampableTransformer;
use Blog\Entities\Comment;
use Flugg\Responder\Transformers\Transformer;

class CommentTransformer extends Transformer
{
    protected $load = [
        'dateTime' => TimestampableTransformer::class,
    ];

    public function transform(Comment $comment)
    {
        return array_convert_nulls_to_empty([
            'id' => $comment->getId(),
            'message' => $comment->getMessage(),
            'userName' => $comment->getUser()->getName(),
        ]);
    }

    public function includeDateTime(Comment $comment)
    {
        return $comment;
    }
}
