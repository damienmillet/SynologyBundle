<?php


namespace DM\SynologyBundle\Component\WebApi\FileStation;

/**
 * Class Upload
 * @package DM\SynologyBundle\Component\WebApi\FileStation
 */
class Upload
{
    private const PATH = 'webapi/entry.cgi';
    private const API = 'SYNO.FileStation.Upload';

    /**
     * @param $path
     * @param $createParents
     * @param $file
     * @param $overwrite
     * @return array
     */
    public static function upload($path, $createParents, $file, $overwrite): array
    {
        return [
            'method' => 'POST',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 3,
                'method' => 'upload',
                'path' => $path,
                'create_parents' => $createParents,
                'file' => $file,
                'overwrite' => $overwrite
            ]
        ];
    }
}
