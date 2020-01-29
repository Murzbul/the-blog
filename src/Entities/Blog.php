<?php

namespace Blog\Entities;

use Blog\Payloads\Blogs\BlogUpdatePayload;

class Blog
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $body;

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

    public function getBody(): string
    {
        return $this->body;
    }

    public function update(BlogUpdatePayload $payload)
    {
        $this->title = $payload->title();
        $this->body = $payload->body();
    }
}
