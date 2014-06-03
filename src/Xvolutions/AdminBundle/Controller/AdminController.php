<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Xvolutions\AdminBundle\Entity\Page;
use \Xvolutions\AdminBundle\Form\PageType;
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
            'XvolutionsAdminBundle:Pages:main.html.twig',
            array(
                'username' => $this->getUsername()
            )
        );
    }

    public function setupAction() {
        $this->verifyaccess();
        return $this->render('XvolutionsAdminBundle:Pages:setup.html.twig', array(
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
            var_dump( $page->setDate($datetime ) );
            $em->persist( $page );
            $em->flush();
            
            return $this->render('XvolutionsAdminBundle:Pages:pages.html.twig', array(
                'form' => $form->createView(),
                'username' => $this->getUsername()
            ));
        }

        return $this->render('XvolutionsAdminBundle:Pages:pages.html.twig', array(
            'form' => $form->createView(),
            'username' => $this->getUsername()
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
