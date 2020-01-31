<?php

namespace App\Http\Api\Requests\Blogs;

use App\Infrastructure\Doctrine\Criteria\Blogs\BlogFilter;
use App\Infrastructure\Doctrine\Criteria\Blogs\BlogSorting;
use Illuminate\Http\Request;
use Lib\Criteria\Criteria;

class BlogListRequest extends Criteria
{
    /** @var Request */
    protected $request;

    public function __construct(Request $request)
    {
        $values = $request->all();
        $blogFilter = new BlogFilter($values);
        $blogSorting = new BlogSorting($values);

        parent::__construct($request, $blogFilter, $blogSorting);
    }

    public function getSortingDefaults(): array
    {
        return [BlogSorting::TITLE => 'desc'];
    }
}
