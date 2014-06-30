<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\BlogPost;
use Xvolutions\AdminBundle\Form\BlogPostType;
use Symfony\Component\Security\Core\Exception;


/**
 * Description of BlogPostController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class BlogPostController extends AdminController
{

    /**
     * Controller responsible to add a new blog post for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new blog post
     */
    public function addBlogPostsAction(Request $request) {
        parent::verifyaccess();

        $blogPost = new BlogPost();
        $blogPostType = new BlogPostType();

        $form = $this->createForm($blogPostType, $blogPost)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = null;
        $error = null;
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($blogPost);
            $em->flush();
            $status = 'Artigo adicionado com sucesso';

            $blogPostList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:BlogPost')->findAll();

            return $this->render('XvolutionsAdminBundle:blog:post/posts.html.twig', array(
                        'title' => 'Artigos',
                        'blogPostList' => $blogPostList,
                        'status' => $status,
                        'error' => $error,
            ));
        }

        return $this->render('XvolutionsAdminBundle:blog:post/add_posts.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Adicionar um novo Artigo',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to edit an existing blog post for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing blog post
     * @return type the template for editing a blog post
     */
    public function editBlogPostsAction(Request $request, $id) {
        parent::verifyaccess();

        $blogPostType = new BlogPostType();

        $blogPost = $this->getDoctrine()->getRepository( 'XvolutionsAdminBundle:BlogPost' )->find( $id );

        $form = $this->createForm( $blogPostType, $blogPost )
                ->add( 'Guardar', 'submit' )
        ;

        $status = null;
        $error = null;

        $form->handleRequest( $request );

        if ( $form->isValid() )
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $status = 'Artigo actualizado com sucesso';

            $blogPostList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:BlogPost')->findAll();

            return $this->render('XvolutionsAdminBundle:blog:post/posts.html.twig', array(
                        'title' => 'Categorias',
                        'blogPostList' => $blogPostList,
                        'status' => $status,
                        'error' => $error,
            ));
        }

        return $this->render('XvolutionsAdminBundle:blog:post/add_posts.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar uma Categoria',
                    'status' => $status,
                    'error' => $error
        ));
    }
}
