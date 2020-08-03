<?php

namespace DM\SynologyBundle\Component\Security;

use App\Entity\User;
use DM\SynologyBundle\Component\Synology;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class TokenAuthenticator extends AbstractGuardAuthenticator
{
    use TokenAuthenticatorTrait;

    protected $synology;
    /**
     * @var EntityManager
     */
    private EntityManager $entityManager;
    /**
     * @var FlashBagInterface
     */
    private FlashBagInterface $bag;

    /**
     * TokenAuthenticator constructor.
     * @param Synology $synology
     * @param EntityManager $entityManager
     * @param FlashBagInterface $bag
     */
    public function __construct(Synology $synology, EntityManager $entityManager, FlashBagInterface $bag)
    {
        $this->synology = $synology;
        $this->entityManager = $entityManager;
        $this->bag = $bag;
    }

    /**
     * Called on every request to decide if this authenticator should be
     * used for the request. Returning `false` will cause this authenticator
     * to be skipped.
     * @param Request $request
     * @return bool
     */
    public function supports(Request $request)
    {
        return $request->isMethod('POST') && $request->request->get('username') &&
            $request->request->get('password');
    }

    /**
     * Called on every request. Return whatever credentials you want to
     * be passed to getUser() as $credentials.
     * @param Request $request
     * @return bool
     */
    public function getCredentials(Request $request)
    {
        $login = $this->synology->getToken($request->request->get('username'), $request->request->get('password'));
        $user = $this->synology->getNormalUser();

        if (!$login->success || !$user->success) {
            return false;
        }
        // if token is ok, tokenIsOk is called
        !$login->success ?: $this->tokenIsOk($user);

        return $user->data->username;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        if (null === $credentials) {
            // The token header was empty, authentication fails with HTTP Status
            // Code 401 "Unauthorized"
            return null;
        }

        // if a User is returned, checkCredentials() is called
        return $this->entityManager->getRepository(User::class)
            ->findOneBy(['username' => $credentials]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return true;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $this->onSuccess($request,$token);
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $this->onFailure();
        return null;
        //return new JsonResponse(['message' => 'Ho no ! Wasn\'t good credentials !'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Called when authentication is needed, but it's not sent
     * @param Request $request
     * @param AuthenticationException|null $authException
     * @return JsonResponse
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = [
            // you might translate this message
            'message' => 'Authentication Required'
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe()
    {
        return false;
    }
}
