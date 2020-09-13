<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class RssFeed
{
    private const PATH = 'webapi/DownloadStation/RRSfeed.cgi';
    private const API = 'SYNO.DownloadStation.RSS.Feed';

    /**
     * @param int $id
     * @param array $opt
     * @return array
     */
    public static function getList(int $id, array $opt): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'list',
                'id' => $id,
                'offset' => $opt['offset'] ?? 0,
                'limit' => $opt['limit'] ?? -1,
                '_sid' => $opt['_sid'] ?? NULL
            ]
        ];
    }
}
