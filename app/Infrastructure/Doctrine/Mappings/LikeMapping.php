<?php

namespace App\Infrastructure\Doctrine\Mappings;

use Blog\Entities\Like;
use Blog\Entities\User;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;
use Lib\Doctrine\Types\UuidType;

class LikeMapping extends EntityMapping
{
    public function mapFor()
    {
        return Like::class;
    }

    public function map(Fluent $builder)
    {
        $builder->field(UuidType::UUID, 'id')->primary();

        $builder->belongsTo(User::class)->inversedBy('user');

        $builder->timestamps('createdAt', 'updatedAt', 'carbonDateTime');
    }
}
