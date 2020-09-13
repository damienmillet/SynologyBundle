<?php


namespace DM\SynologyBundle\Component\WebApi\Core;


class NormalUser
{
    private const PATH = 'webapi/entry.cgi';
    private const API = 'SYNO.Core.NormalUser';

    public static function getUser(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'get',
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }

}
