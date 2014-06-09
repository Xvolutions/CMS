<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Xvolutions\AdminBundle\Entity\Page;
use \Xvolutions\AdminBundle\Form\PageType;

/**
 * Description of PagesController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class PagesController extends AdminController {

    /**
     * Controller responsible to edit a new section for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing section
     * @return type the template for editing a section
     */
    public function editpagesAction(Request $request, $id) {
        parent::verifyaccess();

        $pageType = new PageType();

        $page = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->findBy(array('id' => $id));
        
        $form = $this->createForm($pageType, $page[0])
                ->add('Guardar', 'submit')
        ;

        $ok = NULL;
        $error = NULL;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_page');
            $PageUrl = $formValues["url"];
            // Verify if the url don't exists yet
            $PageUrlPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->findBy(array('url' => $PageUrl));
            if (count($PageUrlPresent) < 1 || $PageUrlPresent[0]->getId() == $id) {
                $em = $this->getDoctrine()->getManager();
                $page[0]->setId_section($request->request->get('section'));
                $em->persist($page[0]);
                $em->flush();
                $ok = 'Página actualizada com sucesso';
            } else {
                $error = 'Uma página com esse URL já existe';
            }
        }

        $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:pages/add_pages.html.twig', array(
                    'form' => $form->createView(),
                    'username' => $this->getUsername(),
                    'title' => 'Editar uma Página',
                    'sectionList' => $sectionList,
                    'ok' => $ok,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to show the pages for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the template of the pages
     */
    public function pagesAction($option = NULL, $id= NULL) {
        parent::verifyaccess();

        $status = NULL;
        $error = NULL;
        switch ($option) {
            case 'remove': {
                    $this->RemovePage($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedPages($ids, $status, $error);
                    break;
                }
        }

        // SELECT p.Title, s.section FROM page p, section s WHERE p.id_section = s.id
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
           'SELECT p.id, p.title, p.url, p.date, s.section
            FROM XvolutionsAdminBundle:Page p, XvolutionsAdminBundle:Section s
            WHERE p.id_section = s.id
            ORDER BY p.title ASC'
        );

        $pagesList = $query->getResult();
        
        return $this->render('XvolutionsAdminBundle:pages:pages/pages.html.twig', array(
                    'username' => $this->getUsername(),
                    'pagesList' => $pagesList,
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to add a new page for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new page
     */
    public function addpagesAction(Request $request) {
        parent::verifyaccess();

        $page = new Page();
        $pageType = new PageType();

        $form = $this->createForm($pageType, $page)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $error = NULL;
        $ok = NULL;
        if ($form->isValid()) {
            $datetime = new \DateTime('now');
            $em = $this->getDoctrine()->getManager();
            $page->setDate($datetime); // I Want to define the date
            $page->setId_section($request->request->get('section'));

            $formValues = $request->request->get('xvolutions_adminbundle_page');
            $url = $formValues["url"];
            // Verify the URL of the page don't exists yet
            $titleIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->findBy(array('url' => $url));
            if (count($titleIsPresent) < 1) {
                $em->persist($page);
                $em->flush();
                $ok = 'Página inserida com sucesso';
            } else {
                $error = 'Uma página com esse URL já existe';
            }
        }

        $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:pages/add_pages.html.twig', array(
                    'form' => $form->createView(),
                    'username' => $this->getUsername(),
                    'title' => 'Adicionar uma Página',
                    'sectionList' => $sectionList,
                    'ok' => $ok,
                    'error' => $error
        ));
    }

        /**
     * This is function is repsonsible to remove a page
     * 
     * @param type $id the id of the page to be removed
     * @return string with the information message
     */
    private function RemovePage($id, &$status, &$error) {
        try {
            $em = $this->getDoctrine()->getManager();
            $page = $em->getRepository('XvolutionsAdminBundle:Page')->find($id);
            if( $page != 'empty') {
                $em->remove($page);
                $em->flush();
                $status = 'Página removida com sucesso';
            } else {
                $error = "Erro ao remover a página";
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover a página";
        }
    }

    /**
     * This function is responsible to remove a list of pages
     * 
     * @param type $ids array containing the id's of the pages to be removed
     * @return string with the message
     */
    private function RemoveSelectedPages($ids, &$status, &$error) {
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $page = $em->getRepository('XvolutionsAdminBundle:Page')->find($id);
                if( $page != 'empty') {
                    $em->remove($page);
                    $em->flush();
                    $status = 'Página(s) removida(s) com sucesso';
                } else {
                    $error = "Erro ao remover a(s) página(s)";
                }
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover as página(s)";
        }
    }
}
