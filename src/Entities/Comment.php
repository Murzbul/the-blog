<?php

namespace Blog\Entities;

use Blog\Contracts\Timestampable as ITimestapable;
use Lib\Traits\Timestampable;
use Ramsey\Uuid\Uuid;

class Comment implements ITimestapable
{
    use Timestampable;

    /** @var Uuid */
    private $id;
    /** @var string */
    private $message;
    /** @var User */
    private $user;

    public function __construct(string $message, User $user)
    {
        $this->id = Uuid::uuid4();
        $this->message = $message;
        $this->user = $user;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
