<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of MenuController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class MenuController extends AdminController
{

    public function menuAction($option = null, $id = null, $status = null, $error = null)
    {
        parent::verifyaccess();

        if ($error != null) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null) {
            return new Response($status, Response::HTTP_OK);
        }

        $AliasList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findAll();

        return $this->render('XvolutionsAdminBundle:menu:menu.html.twig', array(
                    'title' => 'Menus',
                    'AliasList' => $AliasList,
                    'status' => $status,
                    'error' => $error
        ));
    }
}
