<?php declare(strict_types=1);


namespace ChocoCode\Paginator\Http;


interface ServerBagInterface
{
    public function get(string $key, $default = null): mixed;
}
