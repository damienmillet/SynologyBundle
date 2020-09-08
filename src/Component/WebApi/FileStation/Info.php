<?php


namespace DM\SynologyBundle\Component\WebApi\FileStation;


class Info
{
    private const PATH = 'webapi/entry.cgi'; //FIXME
    private const API = 'SYNO.FileStation.List';

    public static function getInfo(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'get',
                'is_manager' => $opt['is_manager'] ?: NULL,
                'support_virtual' => $opt['support_virtual'] ?: NULL,
                'support_sharing' => $opt['support_sharing'] ?: NULL,
                'hostname' => $opt['hostname'] ?: NULL,
            ]
        ];
    }
}
