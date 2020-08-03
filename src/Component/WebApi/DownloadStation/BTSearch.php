<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;


class BTSearch
{
    private const PATH = 'webapi/DownloadStation/btsearch.cgi';
    private const API = 'DownloadStation.BTSearch';

    /**
     * @param string $keyword
     * @param string $module
     * @return array
     */
    public function getList(string $keyword, string $module = 'enabled'): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'start',
                'keyword' => $keyword,
                'module' => $module,
            ]
        ];
    }

    /**
     * @param string $taskid
     * @param null $options
     * @return array
     */
    public function list(string $taskid, $options = []): array
    {

        $array = [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'start',
                'taskid' => $taskid,
            ]
        ];

        foreach ($options as $key => $value) {
            $array['query'] = [$key => $value];

        }

        return $array;
    }

    /**
     * @return array
     */
    public function getCategory(): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getCategory',
            ]
        ];
    }

    public function clean(string $id, string $title): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'clean',
                'id' => $id,
                'title' => $title
            ]
        ];
    }

    public function getModule(): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getModule',
            ]
        ];
    }


}
