<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Language;
use Xvolutions\AdminBundle\Form\LanguageType;
use Symfony\Component\Debug\ErrorHandler;

/**
 * Description of LanguagesController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class LanguagesController extends AdminController
{

    /**
     * Controller responsible to add a new language for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new language
     */
    public function addlanguagesAction(Request $request)
    {
        parent::verifyaccess();

        $language = new Language();
        $languageType = new LanguageType();

        $form = $this->createForm($languageType, $language)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = NULL;
        $error = NULL;
        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_language');
            $languageName = $formValues["language"];
            $languageCode = $formValues["code"];
            // Verify if the section don't exists yet
            $languageIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findBy(array('language' => $languageName));
            $languageCodeIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findBy(array('code' => $languageCode));
            if (count($languageIsPresent) < 1 && count($languageCodeIsPresent) < 1) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($language);
                $em->flush();
                $status = 'Ídioma inserido com sucesso';

                $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();

                return $this->render('XvolutionsAdminBundle:languages:languages.html.twig', array(
                            'languageList' => $languageList,
                            'status' => $status,
                            'error' => $error
                ));
            } else {
                $error = 'Um ídioma com esse nome ou esse código já existe';
            }
        }

        return $this->render('XvolutionsAdminBundle:languages:add_languages.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Adicionar um novo Ídioma',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to edit a langyage for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing language
     * @return type the template for editing a language
     */
    public function editlanguagesAction(Request $request, $id)
    {
        parent::verifyaccess();

        $languageType = new LanguageType();

        // Verify if the section don't exists yet
        $language = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findBy(array('id' => $id));

        $form = $this->createForm($languageType, $language[0])
                ->add('Guardar', 'submit')
        ;

        $status = NULL;
        $error = NULL;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_language');
            $languageName = $formValues["language"];
            $languageCode = $formValues["code"];

            // Verify if the language don't exists yet
            $languageIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findBy(array('language' => $languageName));
            $languageCodeIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findBy(array('code' => $languageCode));

            if (count($languageIsPresent) < 1 || $languageIsPresent[0]->getId() == $id && count($languageCodeIsPresent) < 1 || $languageCodeIsPresent[0]->getId() == $id) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($language[0]);
                $em->flush();
                $status = 'Ídioma actualizado com sucesso';

                $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();

                return $this->render('XvolutionsAdminBundle:languages:languages.html.twig', array(
                            'languageList' => $languageList,
                            'status' => $status,
                            'error' => $error
                ));
            } else {
                $error = 'Um ídioma com esse nome, ou código, já existe';
            }
        }

        return $this->render('XvolutionsAdminBundle:languages:add_languages.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar um Ídioma',
                    'status' => $status,
                    'error' => $error
        ));
    }

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
    public function languagesAction($option = NULL, $id = NULL)
    {
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
                    if ($ids != 0) {
                        $this->RemoveSelectedLanguages($ids, $status, $error);
                    } else {
                        $error = "Erro ao remover ídioma(s)";
                    }
                    break;
                }
        }

        if ($error != NULL) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != NULL) {
            return new Response($status, Response::HTTP_OK);
        }

        $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();

        return $this->render('XvolutionsAdminBundle:languages:languages.html.twig', array(
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
    private function removeLanguage($id, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            $language = $em->getRepository('XvolutionsAdminBundle:Language')->find($id);
            if ($language != 'empty') {
                $em->remove($language);
                $em->flush();
                $status = 'Ídioma removido com sucesso';
            } else {
                $error = "Erro ao remover um ídioma";
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover o ídioma";
        }
    }

    /**
     * This function is responsible to remove a list of languages
     * 
     * @param type $ids array containing the id's of the languages to be removed
     * @return string with the message
     */
    private function removeSelectedLanguages($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id)
            {
                $language = $em->getRepository('XvolutionsAdminBundle:Language')->find($id);
                if ($language != 'empty') {
                    $em->remove($language);
                    $em->flush();
                    $status = 'Ídioma(s) removido(s) com sucesso';
                } else {
                    $error = "Erro ao remover o(s) ídioma(s)";
                }
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover o(s) ídioma(s)";
        }
    }

}
