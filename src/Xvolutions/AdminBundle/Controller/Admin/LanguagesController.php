<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Xvolutions\AdminBundle\Entity\Language;
/**
 * Description of LanguagesController
 *
 * @author Pedro Resende <pedro.resende@ez.no>
 */
class LanguagesController extends AdminController
{
    /**
     * Function responsible for handling the languages removal and the languages
     * removal array
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $option This option might be a 'remove' for a single language and
     * 'removeselected' to remove an array of id's
     * @param type $id The id, or id's, of the language(s) to be removed
     * @return type call the controller to handle 
     */
    public function languagesAction($option = NULL, $id = NULL) {
        parent::verifyaccess();

        $status = NULL;
        $error = NULL;
        switch ($option) {
            case 'remove': {
                    //$this->RemoveSection($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    //$this->RemoveSelectedSections($ids, $status, $error);
                    break;
                }
        }

        $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:languages/languages.html.twig', array(
                    'username' => $this->getUsername(),
                    'languageList' => $languageList,
                    'status' => $status,
                    'error' => $error
        ));
    }
}
