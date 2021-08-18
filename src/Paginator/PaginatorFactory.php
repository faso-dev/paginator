<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Paginator;

use ChocoCode\Paginator\Pagination\PaginationOptionInterface;
use function max;
use function min;

/**
 * Class PaginatorBuilder
 * @package ChocoCode\Paginator\Paginator
 */
final class PaginatorFactory
{
    /**
     * @param int $totalItems
     * @param int $itemsPerPage
     * @param int $pageRange
     * @param int $currentPage
     * @param PaginationOptionInterface|null $paginationOption
     * @return Paginator
     */
    public static function create(int $totalItems, int $itemsPerPage, int $pageRange, int $currentPage, ?PaginationOptionInterface $paginationOption = null): Paginator
    {
        $current = $currentPage;
        $pageCount = (int)\ceil($totalItems / $itemsPerPage);
        if ($pageCount < $current) {
            $current = $pageCount;
        }

        if ($pageRange > $pageCount) {
            $pageRange = $pageCount;
        }

        $delta = \ceil($pageRange / 2);

        if ($current - $delta > $pageCount - $pageRange) {
            $rangePages = \range($pageCount - $pageRange + 1, $pageCount);
        } else {
            if ($current - $delta < 0) {
                $delta = $current;
            }

            $offset = $current - $delta;
            $rangePages = \range($offset + 1, $offset + $pageRange);
        }

        $proximity = \floor($pageRange / 2);

        $startPage = $current - $proximity;
        $endPage = $current + $proximity;

        if ($startPage < 1) {
            $endPage = min($endPage + (1 - $startPage), $pageCount);
            $startPage = 1;
        }

        if ($endPage > $pageCount) {
            $startPage = max($startPage - ($endPage - $pageCount), 1);
            $endPage = $pageCount;
        }

        $paginator = (new Paginator($totalItems, $itemsPerPage))
            ->setPageRange($pageRange)
            ->setStartPage($startPage)
            ->setEndPage($endPage)
            ->setRangePages($rangePages)
            ->setCurrentPage($current)
            ->setPageCount($pageCount);
        if (null !== $paginationOption) {
            $paginator->setPaginationOptions($paginationOption);
        }
        return $paginator;

    }
}
