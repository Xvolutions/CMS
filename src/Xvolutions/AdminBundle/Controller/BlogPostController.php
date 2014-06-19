<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Xvolutions\AdminBundle\Entity\BlogPost;
use Xvolutions\AdminBundle\Form\BlogPostType;

/**
 * BlogPost controller.
 *
 */
class BlogPostController extends Controller
{

    /**
     * Lists all BlogPost entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('XvolutionsAdminBundle:BlogPost')->findAll();

        return $this->render('XvolutionsAdminBundle:BlogPost:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new BlogPost entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BlogPost();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blog_posts_show', array('id' => $entity->getId())));
        }

        return $this->render('XvolutionsAdminBundle:BlogPost:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a BlogPost entity.
    *
    * @param BlogPost $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogPost $entity)
    {
        $form = $this->createForm(new BlogPostType(), $entity, array(
            'action' => $this->generateUrl('blog_posts_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlogPost entity.
     *
     */
    public function newAction()
    {
        $entity = new BlogPost();
        $form   = $this->createCreateForm($entity);

        return $this->render('XvolutionsAdminBundle:BlogPost:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BlogPost entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPost entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XvolutionsAdminBundle:BlogPost:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BlogPost entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPost entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XvolutionsAdminBundle:BlogPost:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BlogPost entity.
    *
    * @param BlogPost $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogPost $entity)
    {
        $form = $this->createForm(new BlogPostType(), $entity, array(
            'action' => $this->generateUrl('blog_posts_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlogPost entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPost entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blog_posts_edit', array('id' => $id)));
        }

        return $this->render('XvolutionsAdminBundle:BlogPost:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BlogPost entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogPost entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blog_posts'));
    }

    /**
     * Creates a form to delete a BlogPost entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blog_posts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
