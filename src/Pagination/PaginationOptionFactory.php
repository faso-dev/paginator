<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Pagination;

class PaginationOptionFactory
{
    public static function create(string $nextPageLabel = 'Next', string $previousPageLabel = 'Previous', string $pageNameParameter = 'page'): PaginationOption
    {
        return (new PaginationOption($nextPageLabel, $previousPageLabel, $pageNameParameter));
    }
}
