<?php


namespace DM\SynologyBundle\Component\WebApi\FileStation;


class Info
{
    private const PATH = 'webapi/entry.cgi'; //FIXME
    private const API = 'SYNO.FileStation.List';

    public function getInfo(bool $isManager = null, string $virtual = null, string $sharing = null, string $hostname = null)
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'get',
                'is_manager' => $isManager,
                'support_virtual' => $virtual,
                'support_sharing' => $sharing,
                'hostname' => $hostname,
            ]
        ];
    }
}
