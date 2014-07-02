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
    public function addBlogPostsAction(Request $request)
    {
        parent::verifyaccess();

        $blogPost = new BlogPost();
        $blogPostType = new BlogPostType();

        $form = $this->createForm($blogPostType, $blogPost)
                ->add('Criar', 'submit')
        ;

        $form->get('author')->setData(parent::getUsername());

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
    public function editBlogPostsAction(Request $request, $id)
    {
        parent::verifyaccess();

        $blogPostType = new BlogPostType();

        $blogPost = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);

        $form = $this->createForm($blogPostType, $blogPost)
                ->add(
                        'author', null, array(
                    'label' => 'Autor',
                    'disabled' => true,
                    'data' => parent::getUsername()
                        )
                )
                ->add('Guardar', 'submit')
        ;

        $status = null;
        $error = null;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $status = 'Artigo actualizado com sucesso';

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
                    'title' => 'Editar um Artigo',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to show the blog post for and handling the form
     * submission and the database insertion
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the template of the blogPosts
     */
    public function blogPostsAction($option = NULL, $id = NULL)
    {
        parent::verifyaccess();

        $status = null;
        $error = null;
        switch ($option) {
            case 'remove': {
                    $this->removeBlogPost($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->removeSelectedBlogPosts($ids, $status, $error);
                    break;
                }
        }

        if ($error != null) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null) {
            return new Response($status, Response::HTTP_OK);
        }

        $blogPostList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:BlogPost')->findAll();

        return $this->render('XvolutionsAdminBundle:blog:post/posts.html.twig', array(
                    'title' => 'Artigos',
                    'blogPostList' => $blogPostList,
                    'status' => $status,
                    'error' => $error,
        ));
    }

    /**
     * This is function is repsonsible to remove a blog post
     * 
     * @param type $id the id of the blog post to be removed
     * @return string with the information message
     */
    private function removeBlogPost($id, &$status, &$error)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $blogPost = $em->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);
            if ($blogPost != 'empty') {
                $em->remove($blogPost);
                $em->flush();
                $status = 'Artigo removido com sucesso';
            } else {
                $error = "Erro ao remover o artigo";
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover o artigo";
        }
    }

    /**
     * This function is responsible to remove a list of blog posts
     * 
     * @param type $ids array containing the id's of the blog posts to be removed
     * @return string with the message
     */
    private function removeSelectedBlogPosts($ids, &$status, &$error)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id)
            {
                $blogPost = $em->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);
                if ($blogPost != 'empty') {
                    $em->remove($blogPost);
                    $em->flush();
                    $status = 'Artigo removido com sucesso';
                } else {
                    $error = "Erro ao remover o(s) artigo(s)";
                }
            }
            if ($error == null) {
                $status = 'Artigos removidos com sucesso';
            }
        } catch (Exception $ex) {
            $error = "Erro $ex ao remover o(s) artigo(s)";
        }
    }

}
