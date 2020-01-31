<?php

namespace Blog\Entities;

use Blog\Contracts\Timestampable as ITimestapable;
use Blog\Payloads\Blogs\BlogUpdatePayload;
use Lib\Traits\Timestampable;
use Ramsey\Uuid\Uuid;

class Blog implements ITimestapable
{
    use Timestampable;

    /** @var Uuid */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $body;

    public function __construct(string $title, string $body)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->body = $body;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
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
