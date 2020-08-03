<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class Info
{
    private const PATH = 'webapi/DownloadStation/info.cgi';
    private const API = 'SYNO.DownloadStation.Info';

    /**
     * @return array
     */
    public function getInfo(): array
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
    public function getConfig()
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

    public function setServerConfig($options = []): array
    {


        $array = [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'setserverconfig',
            ]
        ];

        foreach ($options as $key => $value) {
            $array['query'] = [$key => $value];
        }

        return $array;
    }
}
