<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\BlogPost;
use Xvolutions\AdminBundle\Form\BlogPostType;
use Xvolutions\AdminBundle\Entity\Alias;
use Symfony\Component\Debug\ErrorHandler;

/**
 * Description of BlogPostController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class BlogPostController extends Controller
{
    use General;

    /**
     * Controller responsible to add a new blog post for and handling the form
     * submission and the database insertion
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new blog post
     */
    public function addBlogPostsAction(Request $request)
    {
        $this->verifyaccess();

        $blogPost = new BlogPost();
        $blogPostType = new BlogPostType();

        $form = $this->createForm($blogPostType, $blogPost)
                ->add(
                        'idalias', 'text', array(
                    'label' => 'URL',
                    'attr' => array('class' => 'url')
                        )
                )
                ->add('Criar', 'submit')
        ;

        $form->get('author')->setData($this->getUsername());

        $form->handleRequest($request);

        $status = null;
        $error = null;
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_blogpost');
            $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $formValues['idalias']));
            if ($alias == null) {
                $alias = new Alias();
                $alias->setType(2);
                $alias->setUrl($formValues['idalias']);
                $blogPost->setIdalias($alias);

                $em->persist($blogPost);
                $em->flush();
                $status = 'Artigo adicionado com sucesso';
            } else {
                $error = 'Já existe um artigo com esse endereço';
            }

            return $this->forward('XvolutionsAdminBundle:Admin/BlogPost:blogPosts', array('error' => $error, 'status' => $status));
        }

        return $this->render('XvolutionsAdminBundle:blog:add_posts.html.twig', array(
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
        $this->verifyaccess();

        $blogPostType = new BlogPostType();

        $blogPost = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);
        $aliasid = $blogPost->getIdalias()->getId();
        $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->find($aliasid);

        $form = $this->createForm($blogPostType, $blogPost)
                ->add(
                        'author', null, array(
                    'label' => 'Autor',
                    'data' => $this->getUsername()
                        )
                )
                ->add(
                        'idalias', 'text', array(
                    'label' => 'URL',
                    'attr' => array('class' => 'url'),
                    'data' => $alias->getUrl()
                        )
                )
                ->add(
                        'date', null, array(
                    'label' => 'Data',
                    'data' => $blogPost->getDate()
                ))
                ->add('Guardar', 'submit')
        ;

        $status = null;
        $error = null;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $formValues = $request->request->get('xvolutions_adminbundle_blogpost');

            $duplicateAlias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $formValues['idalias']));

            if ($duplicateAlias[0]->getId() == $aliasid || $duplicateAlias == null) {
                $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->find($aliasid);
                $alias->setUrl($formValues['idalias']);

                $blogPost->setIdalias($alias);

                $em->persist($blogPost);
                $em->flush();

                $status = 'Artigo actualizado com sucesso';
            } else {
                $error = 'Já existe um artigo com esse endereço';
            }

            return $this->forward('XvolutionsAdminBundle:Admin/BlogPost:blogPosts', array('error' => $error, 'status' => $status));
        }

        return $this->render('XvolutionsAdminBundle:blog:add_posts.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar um Artigo',
                    'status' => $status,
                    'id' => $id,
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
    public function blogPostsAction(Request $request, $option = null, $id = null, $current_page = 1)
    {
        $this->verifyaccess();

        $status = null;
        $error = null;
        switch ($option) {
            case 'remove': {
                    $this->removeSelectedBlogPosts([$id], $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->removeSelectedBlogPosts($ids, $status, $error);
                    break;
                }
            case 'save': {
                    $received = json_decode($request->getContent());
                    $blogPost = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);
                    $aliasid = $blogPost->getIdalias()->getId();

                    $blogPost->setTitle($received->title);
                    $blogPost->setSubTitle($received->subtitle);
                    $blogPost->setText($received->text);
                    $dateAndTime = new \DateTime($received->date_date_year . '/' . $received->date_date_month . "/" . $received->date_date_day . " " . $received->date_time_hour . ":" . $received->date_time_minute);
                    $dateAndTime->format("Y/m/d H:i:s");
                    $blogPost->setDate($dateAndTime);
                    $blogPost->setIdlanguage($this->getDoctrine()->getRepository('XvolutionsAdminBundle:Language')->find($received->id_language));
                    $blogPost->setIdsection($this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->find($received->id_section));
                    $blogPost->setIdstatus($this->getDoctrine()->getRepository('XvolutionsAdminBundle:Status')->find($received->id_status));

                    $duplicateAlias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('url' => $received->idalias));
                    $em = $this->getDoctrine()->getManager();
                    if ($duplicateAlias == null || $duplicateAlias[0]->getId() == $aliasid) {
                        $alias = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->find($aliasid);
                        $alias->setUrl($received->idalias);

                        $blogPost->setIdalias($alias);

                        $em->persist($blogPost);
                        $em->flush();

                        $status = 'Artigo actualizado com sucesso';
                    } else {
                        $error = 'Já existe uma artigo com esse endereço';
                    }

                    $response = new Response();
                    $response->setContent($status);
                    return $response;
                }
        }

        if ($error != null && $option == 'remove' || $option == 'removeselected') {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null && $option == 'remove' || $option == 'removeselected') {
            return new Response($status, Response::HTTP_OK);
        }

        $em = $this->getDoctrine()->getManager();
        $pagination = $this->showPagination($em, 'BlogPost', $current_page);
        $elementsPerPage = $this->container->getParameter('elements_per_page');
        $blogPostList = $this->elementList($em, $current_page, $elementsPerPage, 'BlogPost');

        return $this->render('XvolutionsAdminBundle:blog:posts.html.twig', array(
                    'title' => 'Artigos',
                    'blogPostList' => $blogPostList,
                    'status' => $status,
                    'error' => $error,
                    'pagination' => $pagination
        ));
    }

    /**
     * This function is responsible to remove a list of blog posts
     *
     * @param type $ids array containing the id's of the blog posts to be removed
     * @return string with the message
     */
    private function removeSelectedBlogPosts($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $blogPost = $em->getRepository('XvolutionsAdminBundle:BlogPost')->find($id);
                if ($blogPost != 'empty') {
                    $em->remove($blogPost);
                    $em->flush($blogPost);
                    $status = 'Artigo removido com sucesso';
                } else {
                    $error = "Erro ao remover o(s) artigo(s)";
                }
            }
            if ($error == null) {
                $status = 'Artigos removidos com sucesso';
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover o(s) artigo(s)";
        }
    }
}
