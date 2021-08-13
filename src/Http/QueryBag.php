<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Http;
/**
 * Class QueryBag
 * @package ChocoCode\Paginator\Http
 */
class QueryBag implements QueryBagInterface
{

    /**
     * @inheritDoc
     */
    public function get(string $key, $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function getInt(string $key, ?int $default = 0): int
    {
        return (int)$_GET[$key] ?? $default;
    }
}
