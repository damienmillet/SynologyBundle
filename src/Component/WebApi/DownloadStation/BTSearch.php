<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class BTSearch
{
    private const PATH = 'webapi/DownloadStation/btsearch.cgi';
    private const API = 'DownloadStation.BTSearch';

    /**
     * @param array $opt
     * @return array
     */
    public static function getList(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'start',
                'keyword' => $opt['keyword'],
                'module' => $opt['module'] ?? 'enabled',
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function list(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'start',
                'taskid' => $opt['taskid'],
                'query' => $opt['query']
            ]
        ];
    }

    /**
     * @return array
     */
    public static function getCategory(): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getCategory',
            ]
        ];
    }

    /**
     * @param string $id
     * @param string $title
     * @return array
     */
    public static function clean(string $id, string $title): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'clean',
                'id' => $id,
                'title' => $title
            ]
        ];
    }

    public static function getModule(): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getModule',
            ]
        ];
    }


}
