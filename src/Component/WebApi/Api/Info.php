<?php


namespace DM\SynologyBundle\Component\WebApi\Api;

/**
 * Class Info
 * @package DM\SynologyBundle\Component\WebApi\Api
 */
class Info
{
    private const PATH = 'webapi/query.cgi';
    private const API = 'SYNO.API.Info';

    /**
     * @param string $query
     * @return array
     */
    public function getInfo(string $query = 'all'): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'query',
                'query' => $query]
        ];
    }
}
