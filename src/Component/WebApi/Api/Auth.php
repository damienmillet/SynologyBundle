<?php

namespace DM\SynologyBundle\Component\WebApi\Api;

/**
 * Class Auth
 * @package DM\SynologyBundle\Component\WebApi\Api
 */
class Auth
{
    private const PATH = 'webapi/auth.cgi';
    private const API = 'SYNO.API.Auth';

    /**
     * @param string $user
     * @param string $password
     * @param array $opt
     * @return array
     */
    public static function getLogin(string $user, string $password, array $opt = []): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 3,
                'method' => 'login',
                'query' => 'all',
                'account' => $user,
                'passwd' => $password,
                'session' => $opt['session'] ?: 'filestation',
                'otp_code' => $opt['otp_code'] ?: NULL,
                'format' => $opt['format'] ?: 'cookie'
            ]
        ];
    }

    /**
     * @param string $session
     * @return array
     */
    public static function getLogout(string $session): array
    {
        return [
            'method' => 'GET',
            'path' => self::PATH,
            'query' => [
                'api' => self::API,
                'version' => 1,
                'method' => 'logout',
                'session' => $session,
            ]
        ];
    }

}
