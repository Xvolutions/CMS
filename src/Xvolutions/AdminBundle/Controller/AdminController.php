<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Xvolutions\AdminBundle\Entity\Page;
use Xvolutions\AdminBundle\Entity\Section;
use \Xvolutions\AdminBundle\Form\PageType;
use \Xvolutions\AdminBundle\Form\SectionType;

/**
 * Description of SecurityController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class AdminController extends Controller {

    /**
     * Controller responsible to show the backoffice main page
     * 
     * @return type the template
     */
    public function backofficeAction() {
        $this->verifyaccess();

        return $this->render(
                        'XvolutionsAdminBundle:pages:main.html.twig', array(
                    'username' => $this->getUsername()
                        )
        );
    }

        /**
     * Controller responsible to show the setup main page
     * 
     * @return type the template
     */
    public function setupAction() {
        $this->verifyaccess();
        return $this->render('XvolutionsAdminBundle:pages:setup.html.twig', array(
                    'username' => $this->getUsername()
                        )
        );
    }

    /**
     * Controller responsible to show the pages for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the template of the pages
     */
    public function pagesAction(Request $request) {
        $this->verifyaccess();
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

        return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                    'form' => $form->createView(),
                    'username' => $this->getUsername(),
                    'sectionList' => $sectionList,
                    'ok' => $ok,
                    'error' => $error
                ));
    }


    /**
     * Controller responsible to add a new section for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new section
     */
    public function addsectionAction(Request $request) {
        $this->verifyaccess();
        $section = new Section();
        $sectionType = new SectionType();

        $form = $this->createForm($sectionType, $section)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $ok = NULL;
        $error = NULL;
        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_section');
            $SectionName = $formValues["section"];
            // Verify if the section don't exists yet
            $sectionIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findBy(array('section' => $SectionName));
            if (count($sectionIsPresent) < 1) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($section);
                $em->flush();
                $ok = 'Secção inserida com sucesso';
            } else {
                $error = 'Uma secção com esse nome já existe';
            }
        }

        return $this->render('XvolutionsAdminBundle:pages:add_sections.html.twig', array(
                    'form' => $form->createView(),
                    'username' => $this->getUsername(),
                    'title' => 'Adicionar uma Secção',
                    'ok' => $ok,
                    'error' => $error
                ));
    }

    /**
     * Controller responsible to edit a new section for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing section
     * @return type the template for editing a section
     */
    public function editsectionAction(Request $request, $id) {
        $this->verifyaccess();
        //$section = new Section();
        $sectionType = new SectionType();

        // Verify if the section don't exists yet
        $section = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findBy(array('id' => $id));

        $form = $this->createForm($sectionType, $section[0])
                ->add('Guardar', 'submit')
        ;

        $ok = NULL;
        $error = NULL;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_section');
            $SectionName = $formValues["section"];
            // Verify if the section don't exists yet
            $sectionIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findBy(array('section' => $SectionName));
            // @TODO: Section validation
            if (count($sectionIsPresent) < 1) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($section[0]);
                $em->flush();
                $ok = 'Secção actualizada com sucesso';
            } else {
                $error = 'Uma secção com esse nome já existe';
            }
        }

        return $this->render('XvolutionsAdminBundle:pages:add_sections.html.twig', array(
                    'form' => $form->createView(),
                    'username' => $this->getUsername(),
                    'title' => 'Editar uma Secção',
                    'ok' => $ok,
                    'error' => $error
                ));
    }

    /**
     * Function responsible for handling the section removal and the section
     * removal array
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $option This option might be a 'remove' for a single section and
     * 'removeselected' to remove an array of id's
     * @param type $id The id, or id's, of the section(s) to be removed
     * @return type call the controller to handle 
     */
    public function sectionsAction(Request $request, $option = NULL, $id = NULL) {
        $this->verifyaccess();

        $status = NULL;
        switch ($option) {
            case 'remove': {
                    $status = $this->RemoveSection($id);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $status = $this->RemoveSelectedSection($ids);
                    break;
                }
        }

        $this->verifyaccess();
        $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:sections.html.twig', array(
                    'username' => $this->getUsername(),
                    'sectionList' => $sectionList,
                    'status' => $status
                ));
    }

    /**
     * This is function is repsonsible to remove a section
     * 
     * @param type $id the id of the section to be removed
     * @return string with the information message
     */
    private function RemoveSection($id) {
        try {
            $em = $this->getDoctrine()->getManager();
            $section = $em->getRepository('XvolutionsAdminBundle:Section')->find($id);
            $em->remove($section);
            $em->flush();
            return 'Secção removida com sucesso';
        } catch (Exception $ex) {
            return "Erro $ex ao remover a secção";
        }
    }

    /**
     * This function is responsible to remove a list of sections
     * 
     * @param type $ids array containing the id's of the sections to be removed
     * @return string With the message
     */
    private function RemoveSelectedSection($ids) {
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $section = $em->getRepository('XvolutionsAdminBundle:Section')->find($id);
                $em->remove($section);
                $em->flush();
            }
            return 'Secção(ões) removida(s) com sucesso';
        } catch (Exception $ex) {
            return "Erro $ex ao remover as secção(ões)";
        }
    }

    /**
     * This function is responsible to verify is the use with the
     * Role admin is authenticated
     * 
     * @throws AccessDeniedException
     */
    private function verifyaccess() {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
            //return $this->redirect($this->generateUrl('login'), 301);
        }
    }

    /**
     * This function is responsible for fetching the username of 
     * the logged in user
     * 
     * @return type string
     */
    private function getUsername() {
        $usr = $this->get('security.context')->getToken()->getUser();
        return $usr->getUsername();
    }

}
