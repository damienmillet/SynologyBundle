<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class Statistic
{
    private const PATH = 'webapi/DownloadStation/statistic.cgi';
    private const API = 'DownloadStation.Statistic';

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
}
