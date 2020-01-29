<?php

namespace Blog\Entities;

use Blog\Payloads\Blogs\BlogUpdatePayload;

class Blog
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function update(BlogUpdatePayload $payload)
    {
        $this->name = $payload->name();
    }
}
