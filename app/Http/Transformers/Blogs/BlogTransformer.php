<?php

namespace App\Http\Transformers\Blogs;

use Blog\Entities\Blog;
use Flugg\Responder\Transformers\Transformer;

class BlogTransformer extends Transformer
{
    public function transform(Blog $client)
    {
        return array_convert_nulls_to_empty([
            'id' => $client->getId(),
            'name' => $client->getName(),
        ]);
    }
}
