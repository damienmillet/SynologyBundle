<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class RssSite
{
    private const PATH = 'webapi/DownloadStation/RRSsite.cgi';
    private const API = 'DownloadStation.RSS.Site';

    /**
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getList(int $offset = 0, int $limit = -1): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'list',
                'offset' => $offset,
                'limit' => $limit,
            ]
        ];
    }

    /**
     * @param int|string $id
     * @return array
     */
    public function refresh($id = 'all'): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'refresh',
                'id' => $id,
            ]
        ];
    }


}
