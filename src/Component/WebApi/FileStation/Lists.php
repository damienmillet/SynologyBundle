<?php

namespace DM\SynologyBundle\Component\WebApi\FileStation;

/**
 * Class ListShare
 * @package DM\SynologyBundle\Component\WebApi\FileStation
 */
class Lists
{
    private const PATH = 'webapi/entry.cgi';
    private const API = 'SYNO.FileStation.List';

    /**
     * @param array $opt
     * @return array
     */
    public static function listShare(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 2,
                'method' => 'list_share',
                'offset' => $opt['offset'] ?? 0,
                'limit' => $opt['limit'] ?? 0,
                'sort_by' => $opt['sort_by'] ?? 'name',
                'sort_direction' => $opt['sort_direction'] ?? 'asc',
                'only_writable' => $opt['only_writable'] ?? FALSE,
                'additional' => $opt['additional'] ?? NULL
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function listFile(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 2,
                'method' => 'list',
                'forlder_path' => $opt['forlder_path'] ?? NULL,
                'pattern' => $opt['pattern'] ?? NULL,
                'filetype' => $opt['filetype'] ?? 'all',
                'goto_path' => $opt['goto_path'] ?? NULL,
                'offset' => $opt['offset'] ?? 0,
                'limit' => $opt['limit'] ?? 0,
                'sort_by' => $opt['sort_by'] ?? 'name',
                'sort_direction' => $opt['sort_direction'] ?? 'asc',
                'additional' => $opt['additional'] ?? NULL
            ]
        ];
    }

    public static function getInfo(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 2,
                'method' => 'getinfo',
                'path' => $opt['path'] ?? NULL,
                'additional' => $opt['additional'] ?? NULL
            ]
        ];
    }
}

