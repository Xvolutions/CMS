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
                    $this->RemoveLanguage($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedLanguages($ids, $status, $error);
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

    /**
     * This is function is repsonsible to remove a language
     * 
     * @param type $id the id of the language to be removed
     * @return string with the information message
     */
    private function RemoveLanguage( $id, &$status, &$error) {
        try {
            $em = $this->getDoctrine()->getManager();
            $language = $em->getRepository( 'XvolutionsAdminBundle:Language' )->find( $id );
            if ( $language != 'empty' )
            {
                $em->remove( $language );
                $em->flush();
                $status = 'Ídioma removido com sucesso';
            } else
            {
                $error = "Erro ao remover um ídioma";
            }
        } catch ( Exception $ex ) {
            $error = "Erro $ex ao remover o ídioma";
        }
    }

    
    /**
     * This function is responsible to remove a list of languages
     * 
     * @param type $ids array containing the id's of the languages to be removed
     * @return string with the message
     */
    private function RemoveSelectedLanguages( $ids, &$status, &$error )
    {
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ( $ids as $id ) {
                $language = $em->getRepository( 'XvolutionsAdminBundle:Language' )->find( $id );
                if ( $language != 'empty' )
                {
                    $em->remove( $$languagepage );
                    $em->flush();
                    $status = 'Ídioma(s) removido(s) com sucesso';
                } else
                {
                    $error = "Erro ao remover o(s) ídioma(s)";
                }
            }
        } catch ( Exception $ex ) {
            $error = "Erro $ex ao remover o(s) ídioma(s)";
        }
    }
}
