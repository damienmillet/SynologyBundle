<?php

namespace DM\SynologyBundle\Component;

use DM\SynologyBundle\Component\WebApi\Api\Auth;

trait SynologyTrait
{
    protected string $session;

    public function requestEngine($api, $query = NULL): array
    {
        foreach ($api['query'] as $key => $value) {
            $query .= $key . '=' . $value;
            $query .= $key !== array_key_last($api['query']) ? '&' : NULL;
        }
        return ['method' => $api['method'], 'url' => $this->url . $api['path'] . '?' . $query];
    }

    public function request($method = NULL, $session = NULL, $auth = FALSE)
    {
        !$auth ?: $this->login($session);
        $req = $this->requestEngine($method);
        $response = $this->client->request($req['method'], $req['url']);
        !$auth ?: $this->logout($session);
        return \GuzzleHttp\json_decode($response->getBody());
    }

    public function login($session)
    {
        return $this->request(Auth::getLogin($this->user, $this->password, ['session' => $session]));
    }

    public function logout($session)
    {
        return $this->request(Auth::getLogout($session));
    }
}
