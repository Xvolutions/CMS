<?php

namespace Cleverti\CTILoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function indexAction( Request $request)
    {
        if( $request->getMethod() == 'POST' ) {
            $login = $request->request->get('Login');
            $password = $request->request->get('Password');
            var_dump($login);
            var_dump($password);
        }
        
        return $this->render('ClevertiCTILoginBundle::login_form.html.twig');
    }
    
    public function recoverAction()
    {
        return $this->render('ClevertiCTILoginBundle::login_form.html.twig');
    }
}
