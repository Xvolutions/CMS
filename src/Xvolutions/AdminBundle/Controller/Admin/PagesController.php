<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
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
class PagesController extends Controller
{
    use General;

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
        $this->verifyaccess();

        $pageType = new PageType();

        $page = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->find($id);
        $aliasid = $page->getIdalias()->getId();
        $form = $this->createForm($pageType, $page)
                ->add(
                        'idalias', 'text', array(
                    'label' => 'URL',
                    'data' => $page->getIdalias()->getUrl(),
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
            $requestPage = $request->request->get('xvolutions_adminbundle_page');
            $duplicateAlias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $requestPage['idalias']));

            if ($duplicateAlias == null || $duplicateAlias[0]->getId() == $aliasid) {
                $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->find($aliasid);
                $alias->setUrl($requestPage['idalias']);

                $page->setIdalias($alias);

                $em->persist($page);
                $em->flush();

                $status = 'Página actualizada com sucesso';
            } else {
                $error = 'Já existe uma página com esse endereço';
            }

            return $this->forward('XvolutionsAdminBundle:Admin/Pages:pages', array('error' => $error, 'status' => $status));
        }

        $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();
        $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();
        $pageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->find($id);

        return $this->render('XvolutionsAdminBundle:pages:add_pages.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar uma Página',
                    'sectionList' => $sectionList,
                    'pageList' => $pageList,
                    'languageList' => $languageList,
                    'id' => $id,
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
    public function pagesAction(Request $request, $option = null, $id = null, $current_page = 1, $status = null, $error = null)
    {
        $this->verifyaccess();

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
            case 'save': {
                    $received = json_decode($request->getContent());
                    $page = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->find($id);
                    $aliasid = $page->getIdalias()->getId();

                    $page->setTitle($received->title);
                    $page->setText($received->text);
                    $page->setIdlanguage($this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->find($received->id_language));
                    $page->setIdsection($this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->find($received->id_section));
                    $page->setIdstatus($this->getDoctrine()->getRepository('XvolutionsAdminBundle:Status')->find($received->id_status));

                    $duplicateAlias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $received->idalias));
                    $em = $this->getDoctrine()->getManager();
                    if ($duplicateAlias == null || $duplicateAlias[0]->getId() == $aliasid) {
                        $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->find($aliasid);
                        $alias->setUrl($received->idalias);

                        $page->setIdalias($alias);

                        $em->persist($page);
                        $em->flush();

                        $status = 'Página actualizada com sucesso';
                    } else {
                        $error = 'Já existe uma página com esse endereço';
                    }

                    $response = new Response();
                    $response->setContent($status);
                    return $response;
                }
        }

        if ($error != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($status, Response::HTTP_OK);
        }

        $em = $this->getDoctrine()->getManager();
        $elementsPerPage = $this->container->getParameter('elements_per_page');
        $boundaries = $this->container->getParameter('boundaries');
        $around = $this->container->getParameter('around');
        $select = 'SELECT COUNT(p.id) FROM XvolutionsAdminBundle:Page p';
        $pagination = new PaginatorHelper($em, $select, $elementsPerPage, $current_page, $boundaries, $around);

        $pageList = $this->elementList($em, $current_page, $elementsPerPage, 'Page');

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
        $this->verifyaccess();

        $page = new Page();
        $pageType = new PageType();
        $form = $this->createForm($pageType, $page)
                ->add(
                        'idalias', 'text', array(
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
            return $this->forward('XvolutionsAdminBundle:Admin/Pages:pages', array('error' => $error, 'status' => $status));
        } else {
            $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();
            $pageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->findAll();
            $languageList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->findAll();
            $statusList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Status')->findAll();

            return $this->render('XvolutionsAdminBundle:pages:add_pages.html.twig', array(
                        'form' => $form->createView(),
                        'title' => 'Adicionar uma Página',
                        'sectionList' => $sectionList,
                        'pageList' => $pageList,
                        'languageList' => $languageList,
                        'statusList' => $statusList,
                        'status' => $status,
                        'error' => $error
            ));
        }
    }

    /**
     * This is function is responsible to remove a page
     *
     * @param integer $id the id of the page to be removed
     * @return string with the information message
     */
    private function removePage($id, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            $page = $em->getRepository('XvolutionsAdminBundle:Page')->find($id);
            if ($page != 'empty') {
                $menu = $em->getRepository('XvolutionsAdminBundle:Menu')->findBy(array('page' => $page));
                if (isset($menu[0])) {
                    $em->remove($menu[0]);
                    $em->flush($menu[0]);
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
     * @param integer $ids array containing the id's of the pages to be removed
     * @return string with the message
     */
    private function removeSelectedPages($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $page = $em->getRepository('XvolutionsAdminBundle:Page')->find($id);
                if ($page != 'empty') {
                    $menu = $em->getRepository('XvolutionsAdminBundle:Menu')->findBy(array('page' => $page));
                    if (isset($menu[0])) {
                        $em->remove($menu[0]);
                        $em->flush($menu[0]);
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
        $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $requestPage['idalias']));

        if ($alias == null) {
            $alias = new Alias();
            $alias->setType(1);
            $alias->setUrl($requestPage['idalias']);
            $page->setIdalias($alias);

            $datetime = new \DateTime('now');
            $em = $this->getDoctrine()->getManager();
            $page->setDate($datetime); // I Want to define the date

            $em->persist($page);
            $em->flush();
            $status = 'Página inserida com sucesso';
        } else {
            $error = 'Já existe uma página com esse endereço';
        }
    }

}
