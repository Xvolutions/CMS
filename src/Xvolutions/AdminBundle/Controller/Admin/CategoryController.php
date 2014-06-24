<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Category;
use Xvolutions\AdminBundle\Form\CategoryType;
use Symfony\Component\Security\Core\Exception;
/**
 * Description of CategoriesController
 *
 * @author Pedro Resende <pedro.resende@ez.no>
 */
class CategoryController extends AdminController
{
    public function categoriesAction() {
        parent::verifyaccess();

        $status = null;
        $error = null;

        $categoryList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Category')->findAll();
        
        return $this->render( 'XvolutionsAdminBundle:category:categories.html.twig', array(
                    'categoryList' => $categoryList,
                    'status' => $status,
                    'error' => $error
                ) );
    }
}
