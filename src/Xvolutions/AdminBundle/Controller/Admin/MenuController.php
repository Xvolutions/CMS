<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Menu;

/**
 * Description of MenuController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class MenuController extends Controller
{
    use General;

    /**
     * 
     * @param type $status
     * @param type $error
     * @return Response
     */
    public function menuAction($status = null, $error = null)
    {
        $this->verifyaccess();

        if ($error != null) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null) {
            return new Response($status, Response::HTTP_OK);
        }

        $menuItems = $this->getMenuItems();
        $pages = $this->getPages($menuItems);

        return $this->render('XvolutionsAdminBundle:menu:menu.html.twig', array(
                    'title' => 'Menus',
                    'menuItems' => $menuItems,
                    'pages' => $pages,
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * This method is responsible for storing the menu items position and updating
     * them if theirs position changes
     * 
     * @param Request $request
     * @return Response
     */
    public function updateAction(Request $request)
    {
        $this->verifyaccess();

        $menuOrder = $request->request->get('id');
        $em = $this->getDoctrine()->getManager();
        $this->clearMenu($em);
        if ($menuOrder != null) {
            foreach ($menuOrder as $key => $pageId) {
                $reOrder = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Menu')->findBy(array('page' => $pageId));

                if (isset($reOrder[0])) {
                    if ($reOrder[0]->getPosition() != $key) {
                        $reOrder[0]->setPosition($key);

                        $em->persist($reOrder[0]);
                        $em->flush();
                    }
                } else {
                    $this->addToMenu($pageId, $key, $em);
                }
            }
        }

        return new Response('Updated', Response::HTTP_OK);
    }

    /**
     * This method is responsible for getting all the menu items aka Pages
     * 
     * @return array Array containing the page id and the page title
     */
    private function getMenuItems()
    {
        $menu = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Menu')->findBy([], array('position' => 'ASC'));
        $menuItems = null;
        foreach ($menu as $item) {
            $menuItems[$item->getPage()->getId()] = ['id' => $item->getPage()->getId(), 'title' => $item->getPage()->getTitle()];
        }

        return $menuItems;
    }

    /**
     * This method is responsible for returning the list of pages that aren't
     * in the menu
     * 
     * @param array $menuItems all pages in the menu
     * @return array Array containing the page id and the page title
     */
    private function getPages($menuItems)
    {
        $aliasList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Alias')->findBy(array('type' => '1'));
        $pages = null;
        foreach ($aliasList as $alias) {
            $page = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->findBy(array('id_alias' => $alias->getId()));
            if (!isset($menuItems[$page[0]->getId()])) {
                $pages[] = ['id' => $page[0]->getId(), 'title' => $page[0]->getTitle()];
            }
        }

        return $pages;
    }

    /**
     * This method is responsible for removing all entries from the menu
     * 
     * @param doctrine $em Doctrine
     */
    private function clearMenu($em)
    {
        $menu = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Menu')->findAll();
        foreach ($menu as $item) {
            $em->remove($item);
            $em->flush();
        }
    }

    /**
     * This method is responsible for storing a page into the menu
     * 
     * @param integer $pageId The id of the page
     * @param integer $key The foreach index
     * @param doctrine $em Doctrine
     */
    private function addToMenu($pageId, $key, $em)
    {
        $menu = new Menu();
        $page = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Page')->find($pageId);
        $menu->setPage($page);
        $menu->setPosition($key);

        $em->persist($menu);
        $em->flush();
    }
}
