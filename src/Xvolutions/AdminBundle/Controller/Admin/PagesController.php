<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Page;
use Xvolutions\AdminBundle\Entity\Alias;
use Xvolutions\AdminBundle\Form\PageType;
use Symfony\Component\Debug\ErrorHandler;
use Xvolutions\AdminBundle\Helpers\PaginatorHelper;

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
        $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('id_external' => $page->getId(), 'type' => '1'));
        $form = $this->createForm($pageType, $page)
            ->add(
                'url', 'text', array(
                'label' => 'URL',
                'data' => $alias[0]->getUrl(),
                'attr' => array('class' => 'url')
                )
            )
            ->add('Guardar', 'submit')
        ;

        $status = null;
        $error = null;
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_page');

            $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $formValues['url'], 'type' => 2));
            if (count($alias) == 0) {
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
                $current_page = 1;
                $elementsPerPage = $this->container->getParameter('elements_per_page');
                $boundaries = $this->container->getParameter('boundaries');
                $around = $this->container->getParameter('around');
                $select = 'SELECT COUNT(p.id)
                            FROM XvolutionsAdminBundle:Page p';
                $pagination = new PaginatorHelper($em, $select, $elementsPerPage, $current_page, $boundaries, $around);
                $pageList = $this->pageList($em, $current_page, $elementsPerPage);
                return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                            'pageList' => $pageList,
                            'status' => $status,
                            'error' => $error,
                            'pagination' => $pagination
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
    public function pagesAction($option = null, $id = null, $current_page = 1, $status = null, $error = null)
    {
        parent::verifyaccess();

        switch ($option) {
            case 'remove': {
                    $this->removePage($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->removeSelectedPages($ids, $status, $error);
                    break;
                }
        }

        if ($error != null) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null) {
            return new Response($status, Response::HTTP_OK);
        }
        $em = $this->getDoctrine()->getManager();
        $elementsPerPage = $this->container->getParameter('elements_per_page');
        $boundaries = $this->container->getParameter('boundaries');
        $around = $this->container->getParameter('around');
        $select = 'SELECT COUNT(p.id)
                    FROM XvolutionsAdminBundle:Page p
                    WHERE p.id <> 1 ';
        $pagination = new PaginatorHelper($em, $select, $elementsPerPage, $current_page, $boundaries, $around);
        $pageList = $this->pageList($em, $current_page, $elementsPerPage);
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
                'url', 'text', array(
                'label' => 'URL',
                'attr' => array('class' => 'url')
                )
            )
            ->add('Criar', 'submit')
        ;
        $form->handleRequest($request);
        $error = null;
        $status = null;
        if ($form->isValid()) {
            $this->addPagesValid($request, $page, $status, $error);
            $em = $this->getDoctrine()->getManager();
            $elementsPerPage = $this->container->getParameter('elements_per_page');
            $current_page = 1;
            $boundaries = $this->container->getParameter('boundaries');
            $around = $this->container->getParameter('around');
            $select = 'SELECT COUNT(p.id)
            FROM XvolutionsAdminBundle:Page p
            WHERE p.id <> 1 ';
            $pagination = new PaginatorHelper($em, $select, $elementsPerPage, $current_page, $boundaries, $around);
            $pageList = $this->pageList($em, $current_page, $elementsPerPage);
            return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                        'pageList' => $pageList,
                        'status' => $status,
                        'error' => $error,
                        'pagination' => $pagination
            ));
        } else {
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
                $alias = $em->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('id_external' => $page->getId()));
                if (count($alias) > 0) {
                    $em->remove($alias[0]);
                    $em->flush($alias[0]);
                }
                $em->remove($page);
                $em->flush($page);
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
                    $alias = $em->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('id_external' => $page->getId()));
                    if (count($alias) > 0) {
                        $em->remove($alias[0]);
                        $em->flush($alias[0]);
                    }
                    $em->remove($page);
                    $em->flush($page);
                    $status = 'Página(s) removida(s) com sucesso';
                } else {
                    $error = "Erro ao remover a(s) página(s)";
                }
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover a(s) página(s)";
        }
    }

    /**
     * Function responsible to save on the DB a new page, if the form is valid.
     *
     * @param type $request Request...
     * @param type $page page entity
     * @param string $status to add the status message
     * @param string $error to add the error message
     * @return type
     */
    private function addPagesValid($request, $page, &$status, &$error)
    {
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
    }

    /**
     * Function responsible to return the PageList
     *
     * @param type $em Doctrine
     * @param type $current_page The current page
     * @param type $elementsPerPage The number of elements per page
     * @return type Pagelist
     */
    private function pageList($em, $current_page, $elementsPerPage)
    {
        $startPoint = ($current_page * $elementsPerPage) - $elementsPerPage;
        // SELECT p.Title, s.section FROM page p, section s WHERE p.id_section = s.id
        $queryPage = $em->createQuery(
                        'SELECT p.id, p.title, p.date, l.language, s.section
            FROM XvolutionsAdminBundle:Page p, XvolutionsAdminBundle:Section s, XvolutionsAdminBundle:Language l
            WHERE p.id_section = s.id AND p.id_language = l.id AND p.id != 1 AND p.id <> 1
            ORDER BY p.title ASC'
                )
                ->setFirstResult($startPoint)
                ->setMaxResults($elementsPerPage);

        return $queryPage->getResult();
    }

}
