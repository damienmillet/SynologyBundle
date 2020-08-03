<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class Schedule
{
    private const PATH = 'webapi/DownloadStation/schedule.cgi';
    private const API = 'DownloadStation.Schedule';

    /**
     * @return array
     */
    public function getConfig(): array
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
     * @param bool|null $enabled
     * @param bool|null $emuleEnabled
     * @return array
     */
    public function setConfig(bool $enabled = null, bool $emuleEnabled = null): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getconfig',
                'enabled' => $enabled,
                '$emule_enabled' => $emuleEnabled
            ]
        ];
    }
}

