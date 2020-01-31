<?php

namespace App\Infrastructure\Doctrine\Mappings;

use Blog\Entities\Blog;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;
use Lib\Doctrine\Types\UuidType;

class BlogMapping extends EntityMapping
{
    public function mapFor()
    {
        return Blog::class;
    }

    public function map(Fluent $builder)
    {
        $builder->field(UuidType::UUID, 'id')->primary();
        $builder->string('title');
        $builder->string('body');

        $builder->timestamps('createdAt', 'updatedAt', 'carbonDateTime');
    }
}
