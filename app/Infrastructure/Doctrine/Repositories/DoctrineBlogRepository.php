<?php

namespace App\Infrastructure\Doctrine\Repositories;

use App\Infrastructure\Doctrine\Criteria\Blogs\BlogFilter;
use Blog\Entities\Blog;
use Blog\Repositories\BlogRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Lib\Criteria\Contracts\Criteria;

class DoctrineBlogRepository extends DoctrineReadRepository implements BlogRepository
{
    public function getEntity()
    {
        return Blog::class;
    }

    public function search(Criteria $criteria): Paginator
    {
        // TODO: Install packages to lower and unnacent on postgresql
        $filter = $criteria->getFilter();
        $sorting = $criteria->getSorting();

        $blogAlias = 'blog';

        $queryBuilder = $this->createQueryBuilder($blogAlias);

        // TODO: Encapsulate this funcionality in a builder of query SEARCH
        if ($filter->has(BlogFilter::SEARCH) && ! empty($filter->get(BlogFilter::SEARCH))) {
            $search = [];
            $term = str_replace(' ', '%', $filter->get(BlogFilter::SEARCH));

            foreach ($filter->getFields() as $fieldSearch) {
                $search[] = "LOWER({$blogAlias}.{$fieldSearch}) LIKE LOWER(:searchTerm)";
            }

            $queryBuilder->andWhere($queryBuilder->expr()->orX(...$search));
            $queryBuilder->setParameter('searchTerm', "%{$term}%");
        }

        $status = true;

        $queryBuilder->andWhere($queryBuilder->expr()->eq("$blogAlias.status", ':status'));
        $queryBuilder->setParameter('status', $status);

        // TODO: Encapsulate this funcionality in a builder of query SORT
        foreach ($sorting->getRaw() as $sortBy => $sortSense) {
            $queryBuilder->addOrderBy("$blogAlias.$sortBy", $sortSense);
        }

        return new Paginator($queryBuilder);
    }
}
