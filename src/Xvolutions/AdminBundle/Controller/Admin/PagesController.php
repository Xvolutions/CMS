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
     * Controller responsible to show the pages for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the template of the pages
     */
    public function pagesAction(Request $request) {
        parent::verifyaccess();

        $status = NULL;

        // SELECT p.Title, s.section FROM page p, section s WHERE p.id_section = s.id
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
           'SELECT p.id, p.title, p.date, s.section
            FROM XvolutionsAdminBundle:Page p, XvolutionsAdminBundle:Section s
            WHERE p.id_section = s.id
            ORDER BY p.title ASC'
        );

        $pagesList = $query->getResult();
        
        return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                    'username' => $this->getUsername(),
                    'pagesList' => $pagesList,
                    'status' => $status,
        ));
    }

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

        return $this->render('XvolutionsAdminBundle:pages:add_pages.html.twig', array(
                    'form' => $form->createView(),
                    'username' => $this->getUsername(),
                    'sectionList' => $sectionList,
                    'ok' => $ok,
                    'error' => $error
        ));
    }
}
