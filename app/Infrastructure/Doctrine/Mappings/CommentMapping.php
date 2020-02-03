<?php

namespace App\Infrastructure\Doctrine\Mappings;

use Blog\Entities\Comment;
use Blog\Entities\User;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;
use Lib\Doctrine\Types\UuidType;

class CommentMapping extends EntityMapping
{
    public function mapFor()
    {
        return Comment::class;
    }

    public function map(Fluent $builder)
    {
        $builder->field(UuidType::UUID, 'id')->primary();
        $builder->string('message');

        $builder->belongsTo(User::class)->inversedBy('user');

        $builder->timestamps('createdAt', 'updatedAt', 'carbonDateTime');
    }
}
