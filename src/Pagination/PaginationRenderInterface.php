<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Pagination;
/**
 * Interface PaginationRenderInterface
 * @package ChocoCode\Paginator\Pagination
 */
interface PaginationRenderInterface
{
    /**
     * @return void
     */
    public function rende(): void;

    public function getRendeContent(): string;
}
