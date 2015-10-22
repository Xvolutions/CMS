<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Debug\ErrorHandler;
use Xvolutions\AdminBundle\Helpers\PaginatorHelper;
use Xvolutions\AdminBundle\Helpers\Upload;
use Xvolutions\AdminBundle\Entity\File;

/**
 * Description of FileController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class FileController extends Controller
{
    use General;

    /**
     * Controller responsible to return the list of images uploaded to the database
     * to be used by TinyMCE
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function imageListAction()
    {
        $this->verifyaccess();

        $imageTypes = array('gif', 'jpeg', 'png', 'tiff', 'bmp');
        $files = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:File')->findAll();
        $folder = $this->container->getParameter('files_location');
        $arrayOfFiles = array();
        foreach ($files as $file) {
            $type = $file->getType();

            if (in_array($type, $imageTypes)) {
                $tempArray = array('title' => $file->getName(), 'value' => $folder . $file->getFileName());
                array_push($arrayOfFiles, $tempArray);
            }
        }

        $jsonResponse = json_encode($arrayOfFiles);

        return new Response($jsonResponse, '200');
    }

    /**
     * Controller responsible to show the list of files and for handling the form
     * submission and the database insertion
     *
     * @param string $option can be remove of removeselected
     * @param integer $id of the file to be removed
     * @param integer $current_page the actual page
     * @param string $status if the removal or adition has been done correctly
     * @param string $error if the removal or adition had errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($option = null, $id = null, $current_page = 1, $status = null, $error = null)
    {
        $this->verifyaccess();

        $this->options($option, $id, $status, $error);

        if ($error != null) {
            return new Response($error, Response::HTTP_BAD_REQUEST);
        }
        if ($status != null) {
            return new Response($status, Response::HTTP_OK);
        }

        $pagination = $this->showPagination($current_page);
        $elementsPerPage = $this->container->getParameter('elements_per_page');
        $em = $this->getDoctrine()->getManager();
        $fileList = $this->pageList($em, $current_page, $elementsPerPage);

        $files_location = $this->container->getParameter('files_location');

        return $this->render('XvolutionsAdminBundle:files:files.html.twig', array(
                    'title' => 'Ficheiros',
                    'fileList' => $fileList,
                    'status' => $status,
                    'error' => $error,
                    'pagination' => $pagination,
                    'files_location' => $files_location
        ));
    }

    /**
     * Controller responsible to add a new file
     * 
     * @param Request $request The request to be processed
     * @param type $current_page the actual page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newFileAction(Request $request, $current_page = 1)
    {
        $this->verifyaccess();

        $upload = new Upload();
        $folder = $this->container->getParameter('uploaded_files');
        $fileName = null;
        $originalFileName = null;
        $size = null;
        $type = null;
        $status = null;
        $error = null;
        if ($upload->upload($request, $folder, $fileName, $originalFileName, $size, $type)) {
            $name = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:File')->findBy(array('name' => $originalFileName));
            if (count($name) > 0) {
                @unlink($folder . '/' . $fileName);
                $error = "Já existe um ficheiro com esse nome";
                return new Response($error, Response::HTTP_NOT_ACCEPTABLE);
            } else {
                $file = new File();
                $datetime = new \DateTime('now');
                $file->setDate($datetime);
                $file->setFileName($fileName);
                $file->setName($originalFileName);
                $file->setType($type);
                $file->setSize($size);

                $em = $this->getDoctrine()->getManager();
                $em->persist($file);
                $em->flush();
                $status = 'Ficheiro adicionado com sucesso';
                return new Response($status, Response::HTTP_CREATED);
            }
        } else {
            $error = "Impossível enviar o ficheiro";
            return new Response($error, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     *
     * @param string $option remove or removeselected
     * @param integer $id id of the file, or files, to be removed
     * @param string $status If everything went ok
     * @param string $error If there is and error message
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function options($option, $id, &$status, &$error)
    {
        switch ($option) {
            case 'remove': {
                    $this->removeFile($id, $status, $error);
                    break;
                }
            case 'removeselected': {
                    $ids = json_decode($id);
                    $this->removeSelectedFiles($ids, $status, $error);
                    break;
                }
        }
    }

    /**
     * Function responsible for rendering the pagination
     *
     * @param integer $current_page The current page
     * @return \Xvolutions\AdminBundle\Helpers\PaginatorHelper
     */
    private function showPagination($current_page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        $elementsPerPage = $this->container->getParameter('elements_per_page');
        $boundaries = $this->container->getParameter('boundaries');
        $around = $this->container->getParameter('around');
        $select = 'SELECT COUNT(f.id)
                    FROM XvolutionsAdminBundle:File f';
        return new PaginatorHelper($em, $select, $elementsPerPage, $current_page, $boundaries, $around);
    }

    /**
     * This function is responsible for deleting a file
     *
     * @param integer $id the id of the file to be removed
     * @param string $status with the information message
     * @param string $error with the information message
     */
    private function removeFile($id, &$status, &$error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            $file = $em->getRepository('XvolutionsAdminBundle:File')->find($id);
            if ($file != 'empty') {
                $folder = $this->container->getParameter('uploaded_files');
                if (unlink($folder . '/' . $file->getFileName())) {
                    $em->remove($file);
                    $em->flush();
                    $status = 'Ficheiro removido com sucesso';
                } else {
                    $error = "Erro ao remover o ficheiro";
                }
            } else {
                $error = "Erro ao remover o ficheiro";
            }
        } catch (\ErrorException $ex) {
            if (!is_file($folder . '/' . $file->getFileName())) {
                $em->remove($file);
                $em->flush();
                $error = "Inconsistencia encontrada na base de dados. Esta foi reparada";
            }
        }
    }

    /**
     * This function is responsible to remove a list of files
     *
     * @param array $id the array of id of the files to be removed
     * @param string $status with the information message
     * @param string $error with the information message
     */
    private function removeSelectedFiles($ids, $status, $error)
    {
        ErrorHandler::register();
        try {
            $em = $this->getDoctrine()->getManager();
            foreach ($ids as $id) {
                $file = $em->getRepository('XvolutionsAdminBundle:File')->find($id);
                if ($file != 'empty') {
                    $folder = $this->container->getParameter('uploaded_files');
                    if (unlink($folder . '/' . $file->getFileName())) {
                        $em->remove($file);
                        $em->flush($file);
                        $status = 'Ficheiro removido com sucesso';
                    } else {
                        $error = "Erro ao remover o ficheiro";
                    }
                } else {
                    $error = "Erro ao remover o ficheiro";
                }
            }
        } catch (\ErrorException $ex) {
            $error = "Erro $ex ao remover o ficheiro";
        }
    }

    /**
     * Function responsible to return the PageList
     *
     * @param type $em Doctrine
     * @param type $current_page The current page
     * @param type $elementsPerPage The number of elements per page
     * @return type Pagelist
     */
    private function pageList($em, $current_page, $elementsPerPage)
    {
        $startPoint = ($current_page * $elementsPerPage) - $elementsPerPage;
        $queryPage = $em->createQuery(
                        'SELECT f.id, f.name, f.date, f.size, f.type, f.fileName
            FROM XvolutionsAdminBundle:File f
            ORDER BY f.name ASC'
                )
                ->setFirstResult($startPoint)
                ->setMaxResults($elementsPerPage);

        return $queryPage->getResult();
    }
}
