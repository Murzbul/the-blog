<?php

namespace App\Http\Transformers\Blogs;

use App\Http\Transformers\Defaults\TimestampableTransformer;
use Blog\Entities\Like;
use Flugg\Responder\Transformers\Transformer;

class LikeTransformer extends Transformer
{
    protected $load = [
        'dateTime' => TimestampableTransformer::class,
    ];

    public function transform(Like $like)
    {
        return array_convert_nulls_to_empty([
            'id' => $like->getId(),
            'userName' => $like->getUser()->getName(),
        ]);
    }

    public function includeDateTime(Like $like)
    {
        return $like;
    }
}
