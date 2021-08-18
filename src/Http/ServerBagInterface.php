<?php declare(strict_types=1);


namespace ChocoCode\Paginator\Http;


interface ServerBagInterface
{
    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get(string $key, $default = null);
}
