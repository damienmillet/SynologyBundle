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
     * @param string $session
     * @param string $format
     * @param string|null $otpCode
     * @return array
     */
    public function getLogin(string $user, string $password, string $session, string $format = 'cookie',
                             string $otpCode = null): array
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
                'session' => $session,
                '$otp_code' => $otpCode,
                'format' => $format
            ]
        ];
    }

    /**
     * @param string $session
     * @return array
     */
    public function getLogout(string $session): array
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
