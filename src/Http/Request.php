<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Http;


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
    public function __construct()
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
     * @return ServerBagInterface
     */
    public function server(): ServerBagInterface
    {
        return $this->server;
    }

    public function generate(array $queryParams): string
    {
        $requestQueryParameters = [];
        if (null !== $this->server->get('QUERY_STRING')) {
            parse_str($this->server->get('QUERY_STRING'), $requestQueryParameters);
        }
        $requestQueryParameters = array_merge($requestQueryParameters, $queryParams);
        return $this->server->get('PATH_INFO') . '?' . http_build_query($requestQueryParameters);
    }
}
