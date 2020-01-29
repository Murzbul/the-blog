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
        $itemFilter = new BlogFilter($values);
        $itemSorting = new BlogSorting($values);

        parent::__construct($request, $itemFilter, $itemSorting);
    }

    public function getSortingDefaults(): array
    {
        return [BlogSorting::NAME => 'desc'];
    }
}
