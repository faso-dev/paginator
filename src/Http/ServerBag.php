<?php declare(strict_types=1);


namespace ChocoCode\Paginator\Http;

/**
 * Class ServerBag
 * @package ChocoCode\Paginator\Http
 */
class ServerBag implements ServerBagInterface
{

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $_SERVER[$key] ?? $default;
    }
}
