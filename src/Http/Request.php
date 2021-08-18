<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Http;


use JetBrains\PhpStorm\Pure;

/**
 * Class Request
 * @package ChocoCode\Paginator\Http
 */
class Request implements RequestInterface
{
    private QueryBagInterface $query;
    private ServerBagInterface $server;

    /**
     * Request constructor.
     */
    #[Pure] public function __construct()
    {
        $this->query = new QueryBag;
        $this->server = new ServerBag;
    }

    /**
     * @return QueryBagInterface
     */
    public function query(): QueryBagInterface
    {
        return $this->query;
    }

    /**
     * @return ServerBagInterface|ServerBag
     */
    public function server(): ServerBagInterface|ServerBag
    {
        return $this->server;
    }

    public function generate(array $queryParams): string
    {
        $requestQueries = [];
        parse_str($this->server->get('QUERY_STRING') ?? '', $requestQueries);
        $requestQueries = array_merge($requestQueries, $queryParams);
        return $this->server->get('PATH_INFO') . '?' . http_build_query($requestQueries);
    }
}
