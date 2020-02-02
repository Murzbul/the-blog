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
        $filter = new BlogFilter($values);
        $sorting = new BlogSorting($values);

        parent::__construct($request, $filter, $sorting);
    }

    public function getSortingDefaults(): array
    {
        return [BlogSorting::TITLE => 'desc'];
    }
}
