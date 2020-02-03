<?php

namespace App\Infrastructure\Doctrine\Mappings;

use Blog\Entities\Blog;
use Blog\Entities\Comment;
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
        $builder->boolean('status')->default(true);

        $builder
            ->belongsToMany(Comment::class, 'comments')
            ->joinTable('blog_has_comments')
            ->addJoinColumn(null, 'default_blog_id', 'id', false, false, 'CASCADE')
            ->addInverseJoinColumn('default_comment_id', 'id', false, false, 'CASCADE');

        $builder->timestamps('createdAt', 'updatedAt', 'carbonDateTime');
    }
}
