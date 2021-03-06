<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class BTSearch
{
    private const PATH = 'webapi/DownloadStation/btsearch.cgi';
    private const API = 'SYNO.DownloadStation.BTSearch';

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
                '_sid' => $opt['_sid'] ?? NULL
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
                'query' => $opt['query'],
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function getCategory(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getCategory',
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }

    /**
     * @param string $id
     * @param string $title
     * @param array $opt
     * @return array
     */
    public static function clean(string $id, string $title, array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'clean',
                'id' => $id,
                'title' => $title,
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function getModule(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getModule',
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }


}
