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
        $role = new Role();
        $userType = new UserType();

        $form = $this->createForm($userType, $user)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = NULL;
        $error = NULL;
        if ($form->isValid()) {
            $user->setIsactive('1');

            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);
            //$roles = array($request->request->get( 'id_role' ));
            //$user->setRoles($roles);

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

    public function usersAction( Request $request ) {
        parent::verifyaccess();

        $status = NULL;
        $error = NULL;
        //SELECT u.id, u.name, u.email, r.name FROM User u, user_role ur, Role r WHERE u.id = ur.user_id AND ur.role_id = r.id
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                'SELECT u.id, u.name, u.username, u.email, r.role, r.name as role_name
            FROM XvolutionsAdminBundle:User u, XvolutionsAdminBundle:Role r
            ORDER BY u.name ASC'
        );

        //$userList = $query->getResult();
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
