<?php

namespace DM\SynologyBundle\Component\Security;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Translation\Translator;

trait TokenAuthenticatorTrait
{
    public function tokenIsOk($user)
    {
        if ($user->data->username && $this->entityManager->getRepository(User::class)->findOneBy(['username' => $user->data->username]) === null) {
            $userSyno = $user;
            $user = new User();
            $user->setUsername($userSyno->data->username);
            $user->setRoles(['ROLE_USER']);
            $user->setEmail($userSyno->data->email);
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->bag->add('success', 'Good Job ! Your account has been created !');
        }
    }

    public function onSuccess(Request $request,TokenInterface $token)
    {
        $translator = new Translator($request->getLocale());
        $this->bag->add('success', $translator->trans(  'Welcome') . ' ' . $token->getUser()->getUsername());
    }

    public function onFailure()
    {
        // TODO show that
        $this->bag->add('error', 'Ho no ! Wasn\'t good credentials !');
    }
}
