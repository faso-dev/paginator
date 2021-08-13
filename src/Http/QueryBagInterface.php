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
    public function get(string $key, $default = null): mixed;

    /**
     * @param string $key
     * @param int|null $default
     * @return int
     */
    public function getInt(string $key, ?int $default = 0): int;

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set(string $key, mixed $value): self;

    /**
     * @return array
     */
    public function getAll(): array;
}
