<?php

namespace Blog\Entities;

use Blog\Contracts\Timestampable as ITimestapable;
use Blog\Payloads\Blogs\BlogUpdatePayload;
use Doctrine\Common\Collections\ArrayCollection;
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
    /** @var string */
    private $status;
    /** @var Comment[]|ArrayCollection */
    private $comments;

    public function __construct(string $title, string $body)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->body = $body;
        $this->comments = new ArrayCollection();
        $this->status = true;
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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComment(Comment $commment): void
    {
        $this->comments->add($commment);
    }

    public function changeStatus(bool $status)
    {
        $this->status = $status;
    }

    public function update(BlogUpdatePayload $payload)
    {
        $this->title = $payload->title();
        $this->body = $payload->body();
    }
}
