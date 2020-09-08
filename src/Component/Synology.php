<?php

namespace DM\SynologyBundle\Component;

use DM\SynologyBundle\Component\WebApi\Api\Auth;
use DM\SynologyBundle\Component\WebApi\Core\NormalUser;
use DM\SynologyBundle\Component\WebApi\Api\Info;
use GuzzleHttp\Client;

class Synology
{
    use SynologyTrait;

    private string $user;
    private string $password;
    private string $url;
    /**
     * @var Client
     */
    private Client $client;

    public function __construct($password, $user, $url)
    {
        $this->user = $user;
        $this->password = $password;
        $this->url = $url;
        $this->client = new Client(['cookies' => TRUE]);
    }

    public function getNormalUser()
    {
        return $this->request(NormalUser::getUser(), 'filestation', TRUE);
    }

    public function getInfo()
    {
        return $this->request(Info::getInfo());
    }

    public function getToken(string $user, string $password)
    {
        return $this->request(Auth::getLogin($user, $password));
    }
}
