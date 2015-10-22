<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Controller\AdminControllerInterface;

/**
 * Description of SecurityController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class AdminController extends Controller implements AdminControllerInterface
{
    use General;

    /**
     * Controller responsible to show the backoffice main page
     * 
     * @return type the template
     */
    public function backofficeAction()
    {
        $this->verifyaccess();
        return $this->render(
                        'XvolutionsAdminBundle::main.html.twig');
    }

    /**
     * Controller responsible to show the setup main page
     * 
     * @return type the template
     */
    public function setupAction()
    {
        $this->verifyaccess();
        return $this->render('XvolutionsAdminBundle::setup.html.twig');
    }

    /**
     * Controller responsible to show the username
     * 
     * @return type
     */
    public function usernameAction()
    {
        $this->verifyaccess();
        $username = $this->getUsername();
        return $this->render(
                        'XvolutionsAdminBundle:template:username.html.twig', array(
                    'username' => $username
                        )
        );
    }

    /**
     * Controller responsible to show the gravatar
     * 
     * @return type
     */
    public function gravatarAction()
    {
        $this->verifyaccess();
        $gravatar = $this->getGravatar();
        return $this->render(
                        'XvolutionsAdminBundle:template:gravatar.html.twig', array(
                    'gravatar' => $gravatar
                        )
        );
    }

    /**
     * Displays the PHP info.
     *
     * @return Response A Response instance
     *
     * @throws NotFoundHttpException
     */
    public function phpinfoAction()
    {
        ob_start();
        phpinfo();
        $phpinfo = ob_get_clean();

        return new Response($phpinfo, 200, array('Content-Type' => 'text/html'));
    }
}
