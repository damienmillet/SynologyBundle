<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class RssFeed
{
    private const PATH = 'webapi/DownloadStation/RRSfeed.cgi';
    private const API = 'DownloadStation.RSS.Feed';

    /**
     * @param int $id
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getList(int $id, int $offset = 0, int $limit = -1): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'list',
                'id' => $id,
                'offset' => $offset,
                'limit' => $limit,
            ]
        ];
    }
}
