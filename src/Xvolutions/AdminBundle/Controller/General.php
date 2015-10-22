<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

trait General
{

    /**
     * This function is responsible to verify is the use with the
     * Role admin is authenticated
     * 
     * @throws AccessDeniedException
     */
    protected function verifyaccess()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            throw new AccessDeniedException();
        }
    }

    /**
     * This function is responsible for fetching the username of 
     * the logged in user
     * 
     * @return type string
     */
    protected function getUsername()
    {
        try {
            $user = $this->get('security.context')->getToken()->getUser();
            return $user->getName();
        } catch (\ErrorException $ex) {
            throw new AccessDeniedException();
        }
    }

    /**
     * 
     * This function is responsible to retrieve the url of the user's gravatar
     * 
     * @return url of the gravatar
     * @throws AccessDeniedException
     */
    private function getGravatar()
    {
        try {
            $user = $this->get('security.context')->getToken()->getUser();
            $emailAddress = $user->getEmail();
            $misc = $this->get('xvolutions_admin.misc');
            return $misc->fetchGravatar($emailAddress);
        } catch (\ErrorException $ex) {
            throw new AccessDeniedException();
        }
    }

}