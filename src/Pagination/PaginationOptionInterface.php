<?php

namespace ChocoCode\Paginator\Pagination;

interface PaginationOptionInterface
{
    /**
     * @return string
     */
    public function getNextPageLabel(): string;

    /**
     * @return string
     */
    public function getPageNameParameter(): string;

    /**
     * @return string
     */
    public function getPreviousPageLabel(): string;
}
