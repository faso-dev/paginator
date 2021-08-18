<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Paginator;
/**
 * Interface PaginatorInterface
 * @package ChocoCode\Paginator\Paginator
 */
interface PaginatorInterface
{
    /**
     * @return int|null
     */
    public function getNextPage(): ?int;

    /**
     * @return int|null
     */
    public function getPreviousPage(): ?int;

    /**
     * @return bool
     */
    public function hasNextPage(): bool;

    /**
     * @return bool
     */
    public function hasPreviousPage(): bool;

    /**
     * @return int
     */
    public function getLastPage(): int;

    /**
     * @return int
     */
    public function getFirstPage(): int;

    /**
     * @return int
     */
    public function getCurrentPage(): int;

    /**
     * @return int
     */
    public function getFirstPageInRange(): int;

    /**
     * @return int
     */
    public function getLastPageInRange(): int;

    /**
     * @return float|int
     */
    public function getEndPage(): float|int;

    /**
     * @return float|int
     */
    public function getStarPage(): float|int;

    /**
     * @return int
     */
    public function getPageCount(): int;

    /**
     * @return int
     */
    public function getPageRange(): int;

    /**
     * @return array
     */
    public function getRangePages(): array;

    /**
     * @return int
     */
    public function getTotalItems(): int;

    /**
     * @return int
     */
    public function getItemsPerPage(): int;

    public function getPageParameterName(): string;
}
