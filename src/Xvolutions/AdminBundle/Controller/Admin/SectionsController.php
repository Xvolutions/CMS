<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Xvolutions\AdminBundle\Entity\Section;
use Xvolutions\AdminBundle\Form\SectionType;
use Symfony\Component\Debug\ErrorHandler;

/**
 * Description of SectionsController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class SectionsController extends Controller
{
    use General;

    /**
     * Controller responsible to add a new section for and handling the form
     * submission and the database insertion
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type the templates for adding a new section
     */
    public function addsectionAction(Request $request)
    {
        $this->verifyaccess();

        $section = new Section();
        $sectionType = new SectionType();

        $form = $this->createForm($sectionType, $section)
                ->add('Criar', 'submit')
        ;

        $form->handleRequest($request);

        $status = null;
        $error = null;
        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_section');
            $SectionName = $formValues["section"];
            // Verify if the section don't exists yet
            $sectionIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findBy(array('section' => $SectionName));
            if (count($sectionIsPresent) < 1) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($section);
                $em->flush();
                $status = 'Secção inserida com sucesso';
            } else {
                $error = 'Uma secção com esse nome já existe';
            }

            return $this->forward('XvolutionsAdminBundle:Admin/Sections:sections', array('status' => $status, 'error' => $error));
        }

        return $this->render('XvolutionsAdminBundle:sections:add_sections.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Adicionar uma Secção',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Controller responsible to edit a new section for and handling the form
     * submission and the database insertion
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id the id of an existing section
     * @return type the template for editing a section
     */
    public function editsectionAction(Request $request, $id)
    {
        $this->verifyaccess();

        $sectionType = new SectionType();

        // Verify if the section don't exists yet
        $section = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findBy(array('id' => $id));

        $form = $this->createForm($sectionType, $section[0])
                ->add('Guardar', 'submit')
        ;

        $status = null;
        $error = null;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $formValues = $request->request->get('xvolutions_adminbundle_section');
            $SectionName = $formValues["section"];
            // Verify if the section don't exists yet
            $sectionIsPresent = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findBy(array('section' => $SectionName));

            if (count($sectionIsPresent) < 1 || $sectionIsPresent[0]->getId() == $id) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($section[0]);
                $em->flush();
                $status = 'Secção actualizada com sucesso';
            } else {
                $error = 'Uma secção com esse nome já existe';
            }

            return $this->forward('XvolutionsAdminBundle:Admin/Sections:sections', array('status' => $status, 'error' => $error));
        }

        return $this->render('XvolutionsAdminBundle:sections:add_sections.html.twig', array(
                    'form' => $form->createView(),
                    'title' => 'Editar uma Secção',
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * Function responsible for handling the section removal and the section
     * removal array
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $option This option might be a 'remove' for a single section and
     * 'removeselected' to remove an array of id's
     * @param type $id The id, or id's, of the section(s) to be removed
     * @return type call the controller to handle
     */
    public function sectionsAction($option = null, $id = null)
    {
        $this->verifyaccess();

        $status = null;
        $error = null;
        switch ($option) {
            case 'remove': {
                    $this->RemoveSelectedSections([$id], $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->RemoveSelectedSections($ids, $status, $error);
                    break;
                }
        }

        if ($error != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null && ($option == 'remove' || $option == 'removeselected')) {
            return new Response($status, Response::HTTP_OK);
        }

        $sectionList = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Section')->findAll();

        return $this->render('XvolutionsAdminBundle:sections:sections.html.twig', array(
                    'sectionList' => $sectionList,
                    'status' => $status,
                    'error' => $error
        ));
    }

    /**
     * This function is responsible to remove a list of sections
     *
     * @param type $ids array containing the id's of the sections to be removed
     * @return string With the message
     */
    private function removeSelectedSections($ids, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $query = $em->createQuery(
                                'SELECT p.id
                    FROM XvolutionsAdminBundle:Page p, XvolutionsAdminBundle:Section s
                    WHERE p.id_section = :id'
                        )->setParameter('id', $id);
                $pagesCount = $query->getResult();

                if ($pagesCount != null) {
                    $error = 'Não é possível remover uma secção associada a páginas';
                    break;
                } else {
                    $section = $em->getRepository('XvolutionsAdminBundle:Section')->find($id);
                    $em->remove($section);
                    $em->flush($section);
                    $status = 'Secção(ões) removida(s) com sucesso';
                }
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover as secção(ões)";
        }
    }
}
