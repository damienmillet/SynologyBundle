<?php


namespace DM\SynologyBundle\Component\WebApi\DownloadStation;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Task
{
    private const PATH = 'webapi/DownloadStation/task.cgi';
    private const API = 'DownloadStation.Task';

    /**
     * @param int $offset
     * @param int $limit
     * @param string|null $additional
     * @return array
     */
    public function getList(int $offset = 0, int $limit = -1, string $additional = null): array
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
                'additionnal' => $additional
            ]
        ];
    }

    /**
     * @param int $id
     * @param string|null $additional
     * @return array
     */
    public function getInfo(int $id = 0, string $additional = null): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'getconfig',
                'id' => $id,
                'additionnal' => $additional
            ]
        ];
    }

    /**
     * @param string|null $uri
     * @param UploadedFile|null $file
     * @param string|null $username
     * @param string|null $password
     * @param string|null $unzipPassword
     * @param string|null $destination
     * @return array
     */
    public function create(string $uri = null, UploadedFile $file = null, string $username = null,
                           string $password = null, string $unzipPassword = null, string $destination = null): array
    {
        return [
            'method' => 'POST',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'create',
                'uri' => $uri,
                'file' => $file,
                'username' => $username,
                'password' => $password,
                'unzip_password' => $unzipPassword,
                'destination' => $destination
            ]
        ];
    }

    public function delete(string $id, bool $forceComplete = false): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'delete',
                'id' => $id,
                'force_complete' => $forceComplete
            ]
        ];
    }

    /**
     * @param string $id
     * @return array
     */
    public function pause(string $id): array
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
    public function resume(string $id): array
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
     * @param string|null $destination
     * @return array
     */
    public function edit(string $id, string $destination = null): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'edit',
                'id' => $id,
                'destination' => $destination
            ]
        ];
    }

}
