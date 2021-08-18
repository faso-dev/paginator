<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Http;

/**
 * Interface QueryBagInterface
 * @package ChocoCode\Paginator\Http
 */
interface QueryBagInterface
{
    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * @param string $key
     * @param int|null $default
     * @return int
     */
    public function getInt(string $key, ?int $default = 0): int;
}
