<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class Schedule
{
    private const PATH = 'webapi/DownloadStation/schedule.cgi';
    private const API = 'SYNO.DownloadStation.Schedule';

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
    public static function setConfig(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getconfig',
                'enabled' => $opt['enabled'] ?? NULL,
                'emule_enabled' => $opt['emuleEnabled'] ?? NULL,
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }
}

