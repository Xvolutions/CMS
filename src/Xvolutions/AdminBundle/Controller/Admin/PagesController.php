<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Page;
use Xvolutions\AdminBundle\Entity\Alias;
use Xvolutions\AdminBundle\Form\PageType;
use Symfony\Component\Debug\ErrorHandler;
use Xvolutions\AdminBundle\Helpers\Pagination;
use Xvolutions\AdminBundle\Helpers\Render;

/**
 * Description of PagesController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class PagesController extends AdminController
{

    /**
     * Controller responsible to edit a new section for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing section
     * @return type the template for editing a section
     */
    public function editpagesAction(Request $request, $id)
    {
        parent::verifyaccess();

        $pageType = new PageType();

        $page = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->find($id);
        $form = $this->createForm($pageType, $page)
                ->add(
                    'url', 
                    'text',
                    array(
                        'label' => 'URL',
                        'attr' => array('class' => 'url')
                    )
                )
                ->add('Guardar', 'submit')
        ;

        $status = NULL;
        $error = NULL;

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_page');

            $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $formValues['url'], 'type' => 2));
            if(count($alias)==0) {
                $oldAlias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('id_external' => $id));
                $em->remove($oldAlias[0]);

                $requestPage = $request->request->get('xvolutions_adminbundle_page');
                $page->setIdparent($requestPage['id_parent']);
                $em->flush();

                $alias = new Alias();
                $alias->setUrl($formValues['url']);
                $alias->setType(1);
                $alias->setIdExternal($page->getId());

                $em->persist($alias);
                $em->flush();

                $status = 'Página actualizada com sucesso';

                // SELECT p.Title, s.section FROM page p, section s WHERE p.id_section = s.id
                $em = $this->getDoctrine()->getManager();
                $query = $em->createQuery(
                        'SELECT p.id, p.title, p.date, l.language, s.section
                    FROM XvolutionsAdminBundle:Page p, XvolutionsAdminBundle:Section s, XvolutionsAdminBundle:Language l
                    WHERE p.id_section = s.id AND p.id_language = l.id AND p.id != 1
                    ORDER BY p.title ASC'
                );

                $pageList = $query->getResult();

                return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                            'pageList' => $pageList,
                            'status' => $status,
                            'error' => $error
                        ));
            } else {
                if ($alias[0]->getIdExternal() == $id) {
                    $em->remove($alias[0]);
                    $em->flush();

                    $em->persist($page);
                    $em->flush();

                    $alias = new Alias();
                    $alias->setUrl($formValues['url']);
                    $alias->setType(1);
                    $alias->setIdExternal($page->getId());

                    $em->persist($alias);
                    $em->flush();
                    $status = 'Artigo actualizado com sucesso';
                } else {
                    $error = 'Uma página com esse URL já existe';
                }
            }
        }

        $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();
        $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();
        $query = $em->createQuery(
                        'SELECT 
                p.id, 
                p.title, 
                p.date, 
                s.section, 
                l.language
            FROM 
                XvolutionsAdminBundle:Page p, 
                XvolutionsAdminBundle:Section s, 
                XvolutionsAdminBundle:Language l
            WHERE 
                p.id_language = l.id AND 
                p.id_section = s.id AND 
                p.id != :id
            ORDER BY 
                p.title ASC'
                )->setParameter('id', $id);

        $pageList = $query->getResult();

        return $this->render('XvolutionsAdminBundle:pages:add_pages.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar uma Página',
                    'sectionList' => $sectionList,
                    'pageList' => $pageList,
                    'languageList' => $languageList,
                    'status' => $status,
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
    public function pagesAction($option = NULL, $id = NULL, $current_page = 0)
    {
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

        if ($error != NULL) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != NULL) {
            return new Response($status, Response::HTTP_OK);
        }

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
                'SELECT COUNT(p.id)
                FROM XvolutionsAdminBundle:Page p');

        $total = $query->getResult();

        $elementsPerPage = $this->container->getParameter('elements_per_page');
        $total_pages = ceil($total[0][1]/$elementsPerPage);

        $boundaries = $this->container->getParameter('boundaries');
        $around = $this->container->getParameter('around');

        $page = new Pagination($current_page, $total_pages, $boundaries, $around);
        $list = $page->displayPagination();

        $render = new Render($current_page, $total_pages, $list);
        $pagination = $render->view();

        // SELECT p.Title, s.section FROM page p, section s WHERE p.id_section = s.id
        $query = $em->createQuery(
                'SELECT p.id, p.title, p.date, l.language, s.section
            FROM XvolutionsAdminBundle:Page p, XvolutionsAdminBundle:Section s, XvolutionsAdminBundle:Language l
            WHERE p.id_section = s.id AND p.id_language = l.id AND p.id != 1
            ORDER BY p.title ASC'
        );

        $pageList = $query->getResult();

        return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                    'pageList' => $pageList,
                    'status' => $status,
                    'error' => $error,
                    'pagination' => $pagination
                ));
    }

    /**
     * Controller responsible to add a new page for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new page
     */
    public function addpagesAction(Request $request)
    {
        parent::verifyaccess();

        $page = new Page();
        $pageType = new PageType();

        $form = $this->createForm($pageType, $page)
                ->add(
                    'url', 
                    'text',
                    array(
                        'label' => 'URL',
                        'attr' => array('class' => 'url')
                    )
                )
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $error = NULL;
        $status = NULL;
        if ($form->isValid()) {
            $requestPage = $request->request->get('xvolutions_adminbundle_page');
            $page->setIdparent($requestPage['id_parent']);
            $datetime = new \DateTime('now');
            $em = $this->getDoctrine()->getManager();
            $page->setDate($datetime); // I Want to define the date
            $formValues = $request->request->get('xvolutions_adminbundle_page');

            if ($this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $formValues['url'], 'type' => 1)) == null) {
                $em->persist($page);
                $em->flush();

                $alias = new Alias();
                $alias->setUrl($formValues['url']);
                $alias->setType(1);
                $alias->setIdExternal($page->getId());

                $em->persist($alias);
                $em->flush();

                $status = 'Página inserida com sucesso';
            } else {
                $error = 'Já existe uma página com esse endereço';
            }

            // SELECT p.Title, s.section FROM page p, section s WHERE p.id_section = s.id
            $query = $em->createQuery(
                    'SELECT p.id, p.title, p.date, l.language, s.section
                FROM XvolutionsAdminBundle:Page p, XvolutionsAdminBundle:Section s, XvolutionsAdminBundle:Language l
                WHERE p.id_section = s.id AND p.id_language = l.id AND p.id != 1
                ORDER BY p.title ASC'
            );

            $pageList = $query->getResult();

            return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                        'pageList' => $pageList,
                        'status' => $status,
                        'error' => $error
                    ));
        }

        $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();
        $pageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->findAll();
        $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:add_pages.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Adicionar uma Página',
                    'sectionList' => $sectionList,
                    'pageList' => $pageList,
                    'languageList' => $languageList,
                    'status' => $status,
                    'error' => $error
                ));
    }

    /**
     * This is function is responsible to remove a page
     * 
     * @param type $id the id of the page to be removed
     * @return string with the information message
     */
    private function removePage($id, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            $page = $em->getRepository('XvolutionsAdminBundle:Page')->find($id);
            if ($page != 'empty') {
                $em->remove($page);
                $em->flush();

                $alias = $em->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('id_external' => $page->getId()));
                if(count($alias) > 0) {
                    $em->remove($alias[0]);
                    $em->flush();
                }

                $status = 'Página removida com sucesso';
            } else {
                $error = "Erro ao remover a página";
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover a página";
        }
    }

    /**
     * This function is responsible to remove a list of pages
     * 
     * @param type $ids array containing the id's of the pages to be removed
     * @return string with the message
     */
    private function removeSelectedPages($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id)
            {
                $page = $em->getRepository('XvolutionsAdminBundle:Page')->find($id);
                if ($page != 'empty') {
                    $em->remove($page);
                    $em->flush();

                    $alias = $em->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('id_external' => $page->getId()));
                    if(count($alias) > 0) {
                        $em->remove($alias[0]);
                        $em->flush();
                    }

                    $status = 'Página(s) removida(s) com sucesso';
                } else {
                    $error = "Erro ao remover a(s) página(s)";
                }
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover a(s) página(s)";
        }
    }

}
