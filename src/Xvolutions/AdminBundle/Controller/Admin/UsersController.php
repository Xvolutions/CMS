<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\User;
use Xvolutions\AdminBundle\Form\UserType;
use Symfony\Component\Debug\ErrorHandler;

/**
 * Description of UsersController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class UsersController extends Controller
{
    use General;

    /**
     * Controller responsible to add a new user for and handling the form
     * submission and the database insertion
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new user
     */
    public function addusersAction(Request $request)
    {
        $this->verifyaccess();

        $user = new User();
        $userType = new UserType();

        $form = $this->createForm($userType, $user)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = null;
        $error = null;
        if ($form->isValid()) {
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $misc = $this->get('xvolutions_admin.misc');
            $salt = sha1($misc->randomPassword());
            $user->setSalt($salt);
            $password = $encoder->encodePassword($user->getPassword(), $salt);
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $status = 'Utilizador adicionado com sucesso';

            return $this->forward('XvolutionsAdminBundle:Admin/Users:users', array('status' => $status, 'error' => $error));
        }

        $rolesList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Role')->findAll();

        return $this->render('XvolutionsAdminBundle:users:add_users.hml.twig', array(
                    'form' => $form->createView(),
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
    public function editusersAction(Request $request, $id)
    {
        $this->verifyaccess();

        $userType = new UserType();

        $user = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:User')->find($id);
        $oldpassword = $user->getPassword();
        $oldsalt = $user->getSalt();
        $form = $this->createForm($userType, $user)
                ->add('Guardar', 'submit')
        ;

        $status = null;
        $error = null;

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Verify is the password has been changes
            $formValues = $request->request->get('xvolutions_adminbundle_user');
            if ($formValues['password']['password'] != null) {
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $misc = $this->get('xvolutions_admin.misc');
                $salt = sha1($misc->randomPassword());
                $user->setSalt($salt);
                $password = $encoder->encodePassword($user->getPassword(), $salt);
                $user->setPassword($password);
            } else {
                $user->setSalt($oldsalt);
                $user->setPassword($oldpassword);
            }
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $status = 'Utilizador actualizado com sucesso';

            return $this->forward('XvolutionsAdminBundle:Admin/Users:users', array('status' => $status, 'error' => $error));
        }

        $rolesList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Role')->findAll();

        return $this->render('XvolutionsAdminBundle:users:add_users.hml.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar um Utilizador',
                    'status' => $status,
                    'error' => $error,
                    'roleslist' => $rolesList
        ));
    }

    /**
     * Function responsible for handling the user removal and the user
     * removal array as well has the list of users
     *
     * @param type $option This option might be a 'remove' for a single user and
     * 'removeselected' to remove an array of id's
     * @param type $id The id, or id's, of the user(s) to be removed
     * @return type call the controller to handle
     */
    public function usersAction($option = null, $id = null, $current_page = 1)
    {
        $this->verifyaccess();

        $status = null;
        $error = null;

        switch ($option) {
            case 'remove': {
                    $this->RemoveSelectedUsers([$id], $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedUsers($ids, $status, $error);
                    break;
                }
        }

        if ($error != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($status, Response::HTTP_OK);
        }

        $em = $this->getDoctrine()->getManager();
        $pagination = $this->showPagination($em, 'Page', $current_page);
        $elementsPerPage = $this->container->getParameter('elements_per_page');
        $userList = $this->elementList($em, $current_page, $elementsPerPage, 'User', array('id' => 'DESC'));

        return $this->render('XvolutionsAdminBundle:users:users.html.twig', array(
                    'title' => 'Utilizadores',
                    'userlist' => $userList,
                    'status' => $status,
                    'error' => $error,
                    'pagination' => $pagination
        ));
    }

    /**
     * This function is responsible to remove a list of users
     *
     * @param type $ids array containing the id's of the users to be removed
     * @return string With the message
     */
    private function removeSelectedUsers($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $user = $em->getRepository('XvolutionsAdminBundle:User')->find($id);
                $em->remove($user);
                $em->flush($user);
                $status = 'Utilizador(es) removido(s) com sucesso';
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover utilizador(es)";
        }
    }
}
