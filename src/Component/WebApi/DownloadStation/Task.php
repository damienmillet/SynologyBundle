<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Task
{
    private const PATH = 'webapi/DownloadStation/task.cgi';
    private const API = 'SYNO.DownloadStation.Task';

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
                'additionnal' => $opt['additionnal'] ?? NULL
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function getInfo(array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getconfig',
                'id' => $opt['id'] ?? 0,
                'additionnal' => $opt['additionnal'] ?? NULL
            ]
        ];
    }

    /**
     * @param array $opt
     * @return array
     */
    public static function create(array $opt = []): array
    {
        return [
            'method' => 'POST',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'create',
                'uri' => $opt['uri'] ?? NULL,
                'file' => $opt['file'] ?? NULL,
                'username' => $opt['username'] ?? NULL,
                'password' => $opt['password'] ??NULL,
                'unzip_password' => $opt['unzip_password'] ?? NULL,
                'destination' => $opt['destination'] ?? NULL
            ]
        ];
    }

    public static function delete(string $id, array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'delete',
                'id' => $id,
                'force_complete' => $opt['force_complete'] ?? FALSE
            ]
        ];
    }

    /**
     * @param string $id
     * @return array
     */
    public static function pause(string $id): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'pause',
                'id' => $id,
            ]
        ];
    }

    /**
     * @param string $id
     * @return array
     */
    public static function resume(string $id): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'resume',
                'id' => $id,
            ]
        ];
    }

    /**
     * @param string $id
     * @param array $opt
     * @return array
     */
    public static function edit(string $id, array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'edit',
                'id' => $id,
                'destination' => $opt['destination'] ?? NULL
            ]
        ];
    }

}
