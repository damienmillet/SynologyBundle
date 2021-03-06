<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class RssSite
{
    private const PATH = 'webapi/DownloadStation/RRSsite.cgi';
    private const API = 'SYNO.DownloadStation.RSS.Site';

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
                'method' => 'list',
                'offset' => $opt['offset'] ?? 0,
                'limit' => $opt['limit'] ?? -1,
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }

    /**
     * @param int|string $id
     * @param array $opt
     * @return array
     */
    public static function refresh($id = 'all', array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'refresh',
                'id' => $id,
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }


}
