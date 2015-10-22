<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Role;
use Xvolutions\AdminBundle\Form\RoleType;
use Symfony\Component\Debug\ErrorHandler;

/**
 * Description of RolesController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class RolesController extends Controller
{
    use General;

    /**
     * Controller responsible to add a new role for and handling the form
     * submission and the database insertion
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new role
     */
    public function addrolesAction(Request $request)
    {
        $this->verifyaccess();

        $role = new Role();
        $roleType = new RoleType();

        $form = $this->createForm($roleType, $role)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = null;
        $error = null;
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();
            $status = 'Grupo adicionado com sucesso';

            return $this->forward('XvolutionsAdminBundle:Admin/Roles:roles', array('status' => $status, 'error' => $error));
        }

        return $this->render('XvolutionsAdminBundle:roles:add_roles.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Adicionar um novo Grupo',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to edit an existing role for and handling the form
     * submission and the database insertion
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing role
     * @return type the template for editing a role
     */
    public function editrolesAction(Request $request, $id)
    {
        $this->verifyaccess();

        $roleType = new RoleType();

        $role = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Role')->find($id);

        $form = $this->createForm($roleType, $role)
                ->add('Guardar', 'submit')
        ;

        $status = null;
        $error = null;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $status = 'Grupo actualizado com sucesso';

            return $this->forward('XvolutionsAdminBundle:Admin/Roles:roles', array('status' => $status, 'error' => $error));
        }

        return $this->render('XvolutionsAdminBundle:roles:add_roles.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar um Grupo',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to show the roles for and handling the form
     * submission and the database insertion
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the template of the roles
     */
    public function rolesAction($option = null, $id = null)
    {
        $this->verifyaccess();

        $status = null;
        $error = null;
        switch ($option) {
            case 'remove': {
                    $this->RemoveSelectedRoles([$id], $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedRoles($ids, $status, $error);
                    break;
                }
        }

        if ($error != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($status, Response::HTTP_OK);
        }

        $roleList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Role')->findAll();

        return $this->render('XvolutionsAdminBundle:roles:roles.html.twig', array(
                    'roleList' => $roleList,
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * This function is responsible to remove a list of groups
     *
     * @param type $ids array containing the id's of the groups to be removed
     * @return string with the message
     */
    private function removeSelectedRoles($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $role = $em->getRepository('XvolutionsAdminBundle:Role')->find($id);
                if ($role != 'empty') {
                    $usersList = $em->getRepository('XvolutionsAdminBundle:User')->findAll();
                    $found = false;
                    foreach ($usersList as $user) {
                        $userRole = $user->getRoles();
                        foreach ($userRole as $urole) {
                            if ($urole->getId() == $role->getId()) {
                                $found = true;
                            }
                        }
                    }
                    if ($found == false) {
                        $em->remove($role);
                        $em->flush($role);
                        $status = 'Grupo removido com sucesso';
                    } else {
                        $error = 'Erro ao remover o grupo, tem utilizadores associados';
                    }
                } else {
                    $error = "Erro ao remover o(s) grupo(s)";
                }
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover o(s) grupo(s)";
        }
    }
}
