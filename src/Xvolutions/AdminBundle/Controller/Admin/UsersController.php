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

    /**
     * Controller responsible to add a new user for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new user
     */
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

            $userList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:User')->findAll();

            return $this->render('XvolutionsAdminBundle:pages:users/list_users.html.twig', array(
                        'username' => parent::getUsername(),
                        'title' => 'Utilizadores',
                        'userlist' => $userList,
                        'status' => $status,
                        'error' => $error,
            ));
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


    /**
     * Controller responsible to edit an existing user for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing user
     * @return type the template for editing a user
     */
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

            $userList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:User')->findAll();

            return $this->render('XvolutionsAdminBundle:pages:users/list_users.html.twig', array(
                        'username' => parent::getUsername(),
                        'title' => 'Utilizadores',
                        'userlist' => $userList,
                        'status' => $status,
                        'error' => $error,
            ));
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

    /**
     * Function responsible for handling the user removal and the user
     * removal array as well has the list of users
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $option This option might be a 'remove' for a single user and
     * 'removeselected' to remove an array of id's
     * @param type $id The id, or id's, of the user(s) to be removed
     * @return type call the controller to handle 
     */
    public function usersAction( Request $request, $option = NULL, $id = NULL ) {
        parent::verifyaccess();

        $status = NULL;
        $error = NULL;

        switch ($option) {
            case 'remove': {
                    $this->RemoveUser($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedUsers($ids, $status, $error);
                    break;
                }
        }

        if( $error != NULL ) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        } 
        if( $status != NULL ) {
            return new Response($status, Response::HTTP_OK);
        }

        $userList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:User')->findAll();

        return $this->render('XvolutionsAdminBundle:pages:users/list_users.html.twig', array(
                    'username' => parent::getUsername(),
                    'title' => 'Utilizadores',
                    'userlist' => $userList,
                    'status' => $status,
                    'error' => $error,
        ));
    }

    /**
     * This is function is repsonsible to remove a user
     * 
     * @param type $id the id of the user to be removed
     * @return string with the information message
     */
    private function RemoveUser($id, &$status, &$error) {
        try {
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('XvolutionsAdminBundle:User')->find($id);
            $em->remove($user);
            $em->flush();
            $status = 'Utilizador removido com sucesso';
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover um utilizador";
        }
    }

    /**
     * This function is responsible to remove a list of users
     * 
     * @param type $ids array containing the id's of the users to be removed
     * @return string With the message
     */
    private function RemoveSelectedUsers($ids, &$status, &$error) {
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $user = $em->getRepository('XvolutionsAdminBundle:User')->find($id);
                $em->remove($user);
                $em->flush();
                $status = 'Utilizador(es) removido(s) com sucesso';
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover utilizador(es)";
        }
    }
}
