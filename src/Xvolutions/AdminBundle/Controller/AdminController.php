<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

    public function loginAction()
    {
        return $this->render( 'XvolutionsAdminBundle:Pages:login.html.twig' );
    }

}
