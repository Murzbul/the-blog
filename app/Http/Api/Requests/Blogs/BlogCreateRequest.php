<?php

namespace App\Http\Api\Requests\Blogs;

use Blog\Payloads\Blogs\BlogCreatePayload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BlogCreateRequest implements BlogCreatePayload
{
    const TITLE = 'title';
    const BODY = 'body';

    /** @var Request */
    private $request;

    public function __construct(Request $request)
    {
        if (! Gate::allows('isAdmin')) {
            abort(403, 'Error');
        }

        $this->request = $request;
    }

    public function title(): string
    {
        return $this->request->get(self::TITLE);
    }

    public function body(): string
    {
        return $this->request->get(self::BODY);
    }

    public function validate()
    {
        return $this->request->validate([
            static::TITLE => 'required|max:20',
            static::BODY => 'required|max:500',
        ]);
    }
}
