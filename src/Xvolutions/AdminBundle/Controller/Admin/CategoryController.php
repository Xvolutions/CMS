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

    /**
     * Controller responsible to show the categories for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the template of the roles
     */
    public function categoriesAction($option = NULL, $id = NULL)
    {
        parent::verifyaccess();

        $status = NULL;
        $error = NULL;
        switch ($option) {
            case 'remove': {
                    $this->RemoveCategory($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedCategories($ids, $status, $error);
                    break;
                }
        }

        if ($error != NULL) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != NULL) {
            return new Response($status, Response::HTTP_OK);
        }

        $categoryList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Category')->findAll();

        return $this->render('XvolutionsAdminBundle:blog:category/categories.html.twig', array(
                    'categoryList' => $categoryList,
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * This is function is repsonsible to remove a category
     * 
     * @param type $id the id of the category to be removed
     * @return string with the information message
     */
    private function RemoveCategory($id, &$status, &$error)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository('XvolutionsAdminBundle:Category')->find($id);
            if ($category != 'empty') {
                $em->remove($category);
                $em->flush();
                $status = 'Categoria removido com sucesso';
            } else {
                $error = "Erro ao remover a categoria";
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover a categoria";
        }
    }

    /**
     * This function is responsible to remove a list of categories
     * 
     * @param type $ids array containing the id's of the categories to be removed
     * @return string with the message
     */
    private function RemoveSelectedCategories($ids, &$status, &$error)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id)
            {
                $category = $em->getRepository('XvolutionsAdminBundle:Category')->find($id);
                if ($category != 'empty') {
                        $em->remove($category);
                        $em->flush();
                        $status = 'Categoria removido com sucesso';
                } else {
                    $error = "Erro ao remover a(s) categoria(s)";
                }
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover a(s) categoria(s)";
        }
    }

}
