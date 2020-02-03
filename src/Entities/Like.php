<?php

namespace Blog\Entities;

use Blog\Contracts\Timestampable as ITimestapable;
use Lib\Traits\Timestampable;
use Ramsey\Uuid\Uuid;

class Like implements ITimestapable
{
    use Timestampable;

    /** @var Uuid */
    private $id;
    /** @var User */
    private $user;

    public function __construct(User $user)
    {
        $this->id = Uuid::uuid4();
        $this->user = $user;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
