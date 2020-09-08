<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class Info
{
    private const PATH = 'webapi/DownloadStation/info.cgi';
    private const API = 'SYNO.DownloadStation.Info';

    /**
     * @return array
     */
    public static function getInfo(): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getinfo',
            ]
        ];
    }

    /**
     * @return array
     */
    public static function getConfig(): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getconfig',
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function setServerConfig(array $opt): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'setserverconfig',
                'query' => $opt['query']
            ]
        ];
    }
}
