<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Http;
/**
 * Interface RequestInterface
 * @package ChocoCode\Paginator\Http
 */
interface RequestInterface
{
    /**
     * @return QueryBagInterface
     */
    public function query(): QueryBagInterface;

    public function server(): ServerBagInterface;

    /**
     * @param array $queryParams
     * @return string
     */
    public function generate(array $queryParams): string;
}
