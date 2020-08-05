<?php

namespace DM\SynologyBundle\Component;

use DM\SynologyBundle\Component\WebApi\Api\Auth;

trait SynologyTrait
{
    protected string $session;

    public function requestEngine($api, $query = null): array
    {
        foreach ($api['query'] as $key => $value) {
            $query .= $key . '=' . $value;
            $query .= $key !== array_key_last($api['query']) ? '&' : null;
        }
        return ['method' => $api['method'], 'url' => $this->url . $api['path'] . '?' . $query];
    }

    public function request($method = null, $session = null, $auth = true)
    {
        !$auth ?: $this->login($session);
        $req = $this->requestEngine($method);
        $response = $this->client->request($req['method'], $this->url . $req['url']);
        !$auth ?: $this->logout($session);
        return \GuzzleHttp\json_decode($response->getBody());
    }

    public function login($session)
    {
        return $this->request((new Auth())->getLogin($this->user, $this->password, $session), null,false);
    }

    public function logout($session)
    {
        return $this->request((new Auth())->getLogout($session), null,false);
    }
}
