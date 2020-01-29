<?php

namespace App\Infrastructure\Doctrine\Mappings;

use Blog\Entities\Blog;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class BlogMapping extends EntityMapping
{
    public function mapFor()
    {
        return Blog::class;
    }

    public function map(Fluent $builder)
    {
        $builder->integer('id')->primary()->autoIncrement();
        $builder->string('name');
    }
}
