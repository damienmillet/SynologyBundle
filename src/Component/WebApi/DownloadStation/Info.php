<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class Info
{
    private const PATH = 'webapi/DownloadStation/info.cgi';
    private const API = 'SYNO.DownloadStation.Info';

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
                'method' => 'getinfo',
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function getConfig(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getconfig',
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function setServerConfig(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'setserverconfig',
                'query' => $opt['query'],
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }
}
