<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Xvolutions\AdminBundle\Entity\Page;
use Xvolutions\AdminBundle\Entity\Section;
use \Xvolutions\AdminBundle\Form\PageType;
use \Xvolutions\AdminBundle\Form\SectionType;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Description of SecurityController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class AdminController extends Controller {

    public function backofficeAction() {
        $this->verifyaccess();

        return $this->render(
            'XvolutionsAdminBundle:pages:main.html.twig',
            array(
                'username' => $this->getUsername()
            )
        );
    }

    public function setupAction() {
        $this->verifyaccess();
        return $this->render('XvolutionsAdminBundle:pages:setup.html.twig', array(
                'username' => $this->getUsername()
            )
        );
    }

    public function pagesAction(Request $request) {
        $page = new Page();
        $pageType = new PageType();

        $form = $this->createForm( $pageType, $page )
            ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        if ( $form->isValid() ) {
            $datetime = new \DateTime( 'now' );
            $em = $this->getDoctrine()->getManager();
            $page->setDate($datetime ); // I Want to define the date
            $em->persist( $page );
            $em->flush();
            
            return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
                'form' => $form->createView(),
                'username' => $this->getUsername()
            ));
        }

        return $this->render('XvolutionsAdminBundle:pages:pages.html.twig', array(
            'form' => $form->createView(),
            'username' => $this->getUsername()
        ));
    }

    public function sectionsAction(Request $request) {
        $section = new Section();
        $sectionType = new SectionType();

        $form = $this->createForm( $sectionType, $section )
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        if ( $form->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist( $section );
            $em->flush();
        }

        $sectionList = $this->getDoctrine()->getRepository( 'XvolutionsAdminBundle:Section' )->findAll();

        return $this->render('XvolutionsAdminBundle:pages:sections.html.twig', array(
            'form' => $form->createView(),
            'username' => $this->getUsername(),
            'sectionList' => $sectionList
        ));
    }

    /**
     * @Description This function is responsible to verify is the use with the
     * Role admin is authenticated
     * @throws AccessDeniedException
     */
    public function verifyaccess() 
    {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
            //return $this->redirect($this->generateUrl('login'), 301);
        }
    }

    /**
     * @Description This function is responsible for fetching the username of 
     * the logged in user
     * @return type string
     */
    private function getUsername() {
        $usr= $this->get('security.context')->getToken()->getUser();
        return $usr->getUsername();
    }
}
