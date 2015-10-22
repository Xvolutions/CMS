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
    public function verifyaccess()
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
    public function getUsername()
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
    public function getGravatar()
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

    /**
     * Function responsible to return the Element's List
     *
     * @param type $em Doctrine
     * @param type $current_page The current page
     * @param type $elementsPerPage The number of elements per page
     * @param type $table Entity to search
     * @return type PostList
     */
    public function elementList($em, $current_page, $elementsPerPage, $table)
    {
        $startPoint = ($current_page * $elementsPerPage) - $elementsPerPage;
        $queryPage = $em->getRepository('XvolutionsAdminBundle:'.$table)->findBy(array(), array('date' => 'DESC'), $elementsPerPage, $startPoint);

        return $queryPage;
    }

}
