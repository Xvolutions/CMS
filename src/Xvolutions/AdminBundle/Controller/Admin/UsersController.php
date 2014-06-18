<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\User;
use Xvolutions\AdminBundle\Entity\Role;
use Xvolutions\AdminBundle\Form\UserType;

/**
 * Description of UsersController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class UsersController extends AdminController {

    public function addusersAction(Request $request) {
        parent::verifyaccess();

        $user = new User();
        $roles = new Role();
        $userType = new UserType();

        $form = $this->createForm($userType, $user)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = NULL;
        $error = NULL;
        if ($form->isValid()) {
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $status = 'Utilizador adicionado com sucesso';
        }

        $rolesList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Role')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:users/add_users.hml.twig', array(
                    'form' => $form->createView(),
                    'username' => parent::getUsername(),
                    'title' => 'Adicionar um novo Utilizador',
                    'status' => $status,
                    'error' => $error,
                    'roleslist' => $rolesList
        ));
    }

    public function editusersAction(Request $request, $id) {
        parent::verifyaccess();

        $userType = new UserType();

        $user = $this->getDoctrine()->getRepository( 'XvolutionsAdminBundle:User' )->find( $id );

        $form = $this->createForm( $userType, $user )
                ->add( 'Guardar', 'submit' )
        ;

        $status = NULL;
        $error = NULL;

        $form->handleRequest( $request );

        if ( $form->isValid() )
        {
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $status = 'Utilizador actualizado com sucesso';
        }

        $rolesList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Role')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:users/add_users.hml.twig', array(
                    'form' => $form->createView(),
                    'username' => parent::getUsername(),
                    'title' => 'Adicionar um novo Utilizador',
                    'status' => $status,
                    'error' => $error,
                    'roleslist' => $rolesList
        ));
    }

    public function usersAction( Request $request ) {
        parent::verifyaccess();

        $status = NULL;
        $error = NULL;
        $userList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:User')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:users/list_users.html.twig', array(
                    'username' => parent::getUsername(),
                    'title' => 'Utilizadores',
                    'userlist' => $userList,
                    'status' => $status,
                    'error' => $error,
        ));
    }

}
