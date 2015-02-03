<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     * @Template
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        $error = null;

        if ($session->has(Security::AUTHENTICATION_ERROR)) {
            $error = $session->get(Security::AUTHENTICATION_ERROR);
            $session->remove(Security::AUTHENTICATION_ERROR);
        }

        $lastUsername = (null === $session) ? '' : $session->get(Security::LAST_USERNAME);

        return [
            'last_username' => $lastUsername,
            'error'         => $error,
        ];
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function checkAction()
    {
        throw $this->createNotFoundException('This action should not be executed directly.');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        throw $this->createNotFoundException('This action should not be executed directly.');
    }
}
