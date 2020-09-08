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
     * @param array $opt
     * @return array
     */
    public static function getInfo(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'query',
                'query' => $opt['query'] ?? 'all'
            ]
        ];
    }
}
