<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Description of SecurityController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class AdminController extends Controller {

    /**
     * Controller responsible to show the backoffice main page
     * 
     * @return type the template
     */
    public function backofficeAction() {
        $this->verifyaccess();

        return $this->render(
                        'XvolutionsAdminBundle:pages:main.html.twig', array(
                    'username' => $this->getUsername()
                        )
        );
    }

        /**
     * Controller responsible to show the setup main page
     * 
     * @return type the template
     */
    public function setupAction() {
        $this->verifyaccess();
        return $this->render('XvolutionsAdminBundle:pages:setup.html.twig', array(
                    'username' => $this->getUsername()
                        )
        );
    }

    /**
     * This function is responsible to verify is the use with the
     * Role admin is authenticated
     * 
     * @throws AccessDeniedException
     */
    public function verifyaccess() {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }
    }

    /**
     * This function is responsible for fetching the username of 
     * the logged in user
     * 
     * @return type string
     */
    public function getUsername() {
        try {
            $usr = $this->get('security.context')->getToken()->getUser();
            return $usr->getUsername();
        } catch (Exception $ex) {
            throw new AccessDeniedException();
        }
    }

}
