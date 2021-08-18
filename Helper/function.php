<?php declare(strict_types=1);

use ChocoCode\Paginator\Exception\NotSupportedEngineExceptionInterface;
use ChocoCode\Paginator\Http\Request;
use ChocoCode\Paginator\Http\RequestInterface;
use ChocoCode\Paginator\Pagination\PaginationOptionInterface;
use ChocoCode\Paginator\Pagination\PaginationRender;
use ChocoCode\Paginator\Paginator\Paginator;
use ChocoCode\Paginator\Paginator\PaginatorFactory;
use ChocoCode\Paginator\Paginator\PaginatorInterface;

if (!function_exists('paginator')) {
    /**
     * @param int $totalItems
     * @param int $itemsPerPage
     * @param int $pageRange
     * @param int $currentPage
     * @param PaginationOptionInterface|null $options
     * @return Paginator
     */
    function paginator(int $totalItems, int $itemsPerPage, int $pageRange, int $currentPage, ?PaginationOptionInterface $options = null): Paginator
    {
        return (PaginatorFactory::create($totalItems, $itemsPerPage, $pageRange, $currentPage, $options));
    }
}
if (!function_exists('render')) {
    /**
     * @param PaginatorInterface $paginator
     * @param string $templateEngine
     * @return PaginationRender
     * @throws NotSupportedEngineExceptionInterface
     */
    function render(PaginatorInterface $paginator, string $templateEngine = PaginationRender::BOOTSTRAP_V4 | PaginationRender::BOOTSTRAP_V5): PaginationRender
    {
        return (new PaginationRender($paginator, $templateEngine));
    }
}
if (!function_exists('request')) {
    /**
     * @return RequestInterface
     */
    function request(): RequestInterface
    {
        return new Request();
    }
}
