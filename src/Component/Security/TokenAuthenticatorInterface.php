<?php

namespace DM\SynologyBundle\Component\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

interface TokenAuthenticatorInterface
{
    public function tokenIsOk($user);

    public function onSuccess(Request $request, TokenInterface $token);

    public function onFailure();
}
