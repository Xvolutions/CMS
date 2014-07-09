<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\HttpFoundation\Response;

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
            'XvolutionsAdminBundle::main.html.twig');
    }

    /**
     * Controller responsible to show the setup main page
     * 
     * @return type the template
     */
    public function setupAction() {
        $this->verifyaccess();
        return $this->render('XvolutionsAdminBundle::setup.html.twig');
    }

    /**
     * Controller responsible to show the username
     * 
     * @return type
     */
    public function usernameAction() {
        $this->verifyaccess();
        $username = $this->getUsername();
        return $this->render(
            'XvolutionsAdminBundle:template:username.html.twig', 
            array(
                'username' => $username
            )
        );
    }

    /**
     * Controller responsible to show the gravatar
     * 
     * @return type
     */
    public function gravatarAction() {
        $this->verifyaccess();
        $gravatar = $this->getGravatar();
        return $this->render(
            'XvolutionsAdminBundle:template:gravatar.html.twig', 
            array(
                'gravatar' => $gravatar
            )
        );
    }

    /**
     * Controller responsible to show the phpinfo
     * 
     * @return type
     */
    public function phpinfoAction() {
        ob_start();
        phpinfo();
        $phpinfo = ob_get_clean();
        return $this->render(
            'XvolutionsAdminBundle:phpinfo:phpinfo.html.twig', 
            array(
                'phpinfo' => $phpinfo
            )
        );
    }

    /**
     * This function is responsible to verify is the use with the
     * Role admin is authenticated
     * 
     * @throws AccessDeniedException
     */
    protected function verifyaccess() {
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
    protected function getUsername() {
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
    private function getGravatar() {
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
