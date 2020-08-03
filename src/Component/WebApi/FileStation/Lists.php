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
     * @param int $offset
     * @param int $limit
     * @param string $sortBy
     * @param string $sortDirection
     * @param bool $onlywritable
     * @param string|null $additional
     * @return array
     */
    public function listShare(int $offset = 0, int $limit = 0, string $sortBy = 'name', string $sortDirection = 'asc', bool $onlywritable = false, string $additional = null)
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 2,
                'method' => 'list_share',
                'offset' => $offset,
                'limit' => $limit,
                'sort_by' => $sortBy,
                'sort_direction' => $sortDirection,
                'only_writable' => $onlywritable,
                'additional' => $additional
            ]
        ];
    }

    /**
     * @param string $forlderPath
     * @param string $pattern
     * @param string $gotoPath
     * @param int $offset
     * @param int $limit
     * @param string $sortBy
     * @param string $filetype
     * @param string $sortDirection
     * @param string|null $additional
     * @return array
     */
    public function listFile(string $forlderPath = null, string $pattern = null, string $gotoPath = null, int $offset = 0, int $limit = 0,
                             string $sortBy = 'name', string $filetype = 'all',
                             string $sortDirection = 'asc', string $additional = null)
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 2,
                'method' => 'list',
                'forlder_path' => $forlderPath,
                'pattern' => $pattern,
                'filetype' => $filetype,
                'goto_path' => $gotoPath,
                'offset' => $offset,
                'limit' => $limit,
                'sort_by' => $sortBy,
                'sort_direction' => $sortDirection,
                'additional' => $additional
            ]
        ];
    }

    public function getInfo(string $path = null, string $additional = null)
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 2,
                'method' => 'getinfo',
                'path' => $path,
                'additional' => $additional
            ]
        ];
    }
}

