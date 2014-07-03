<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Tag;
use Xvolutions\AdminBundle\Form\TagType;
use Symfony\Component\Debug\ErrorHandler;

/**
 * Description of TagsController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class TagController extends AdminController
{

    /**
     * Controller responsible to add a new tag for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new role
     */
    public function addTagsAction(Request $request) {
        parent::verifyaccess();

        $tag = new Tag();
        $tagType = new TagType();

        $form = $this->createForm($tagType, $tag)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = null;
        $error = null;
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();
            $status = 'Palavra-Chave adicionado com sucesso';

            $tagList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Tag')->findAll();

            return $this->render('XvolutionsAdminBundle:blog:tag/tags.html.twig', array(
                        'title' => 'Palavras-Chaves',
                        'tagList' => $tagList,
                        'status' => $status,
                        'error' => $error,
            ));
        }

        return $this->render('XvolutionsAdminBundle:blog:tag/add_tags.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Adicionar uma nova Palavra-Chave',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to edit an existing tag for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing tag
     * @return type the template for editing a tag
     */
    public function editTagsAction(Request $request, $id) {
        parent::verifyaccess();

        $tagType = new TagType();

        $tag = $this->getDoctrine()->getRepository( 'XvolutionsAdminBundle:Tag' )->find( $id );

        $form = $this->createForm( $tagType, $tag )
                ->add( 'Guardar', 'submit' )
        ;

        $status = null;
        $error = null;

        $form->handleRequest( $request );

        if ( $form->isValid() )
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $status = 'Palavra-chave actualizada com sucesso';

            $tagList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Tag')->findAll();

            return $this->render('XvolutionsAdminBundle:blog:tag/tags.html.twig', array(
                        'title' => 'Palavra-Chaves',
                        'tagList' => $tagList,
                        'status' => $status,
                        'error' => $error,
            ));
        }

        return $this->render('XvolutionsAdminBundle:blog:tag/add_tags.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar uma Palavra-Chave',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to show the tags for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the template of the roles
     */
    public function tagsAction($option = NULL, $id = NULL)
    {
        parent::verifyaccess();

        $status = NULL;
        $error = NULL;
        switch ($option) {
            case 'remove': {
                    $this->RemoveTag($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedTags($ids, $status, $error);
                    break;
                }
        }

        if ($error != NULL) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != NULL) {
            return new Response($status, Response::HTTP_OK);
        }

        $tagList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Tag')->findAll();

        return $this->render('XvolutionsAdminBundle:blog:tag/tags.html.twig', array(
                    'tagList' => $tagList,
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * This is function is repsonsible to remove a tag
     * 
     * @param type $id the id of the tag to be removed
     * @return string with the information message
     */
    private function removeTag($id, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            $tag = $em->getRepository('XvolutionsAdminBundle:Tag')->find($id);
            if ($tag != 'empty') {
                $em->remove($tag);
                $em->flush();
                $status = 'Palavra-chave removida com sucesso';
            } else {
                $error = "Erro ao remover a palavra-chave";
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover a palavra-chave";
        }
    }

    /**
     * This function is responsible to remove a list of tags
     * 
     * @param type $ids array containing the id's of the tags to be removed
     * @return string with the message
     */
    private function removeSelectedTags($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id)
            {
                $tag = $em->getRepository('XvolutionsAdminBundle:Tag')->find($id);
                if ($tag != 'empty') {
                        $em->remove($tag);
                        $em->flush();
                        $status = 'Palavra-Chave removida com sucesso';
                } else {
                    $error = "Erro ao remover a(s) palavra-chave(s)";
                }
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover a(s) palavra-chave(s)";
        }
    }

}
