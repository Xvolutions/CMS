<?php

namespace Cleverti\CTILoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClevertiCTILoginBundle::login_form.html.twig');
    }
    
    public function recoverAction()
    {
        return $this->render('ClevertiCTILoginBundle::login_form.html.twig');
    }
}
