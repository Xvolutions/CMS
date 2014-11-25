<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Xvolutions\AdminBundle\Controller\AdminController;
use Xvolutions\AdminBundle\Entity\Setting;
use Xvolutions\AdminBundle\Form\SettingType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of SettingController
 *
 * @author pedroresende
 */
class SettingController extends AdminController {

    public function editSettingAction(Request $request, $id = 1) {
        parent::verifyaccess();

        $status = null;
        $error = null;

        $setting = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Setting')->find($id);
        if ($setting == null) {
            $setting = new Setting();
        }

        $settingType = new SettingType();

        $form = $this->createForm($settingType, $setting)
                ->add('Guardar', 'submit')
        ;

        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($setting);
                $em->flush();
                $status = 'Configurações actualizadas com sucesso';
            } else {
                $error = 'Erro !!!';
            }
        }

        return $this->render(
                'XvolutionsAdminBundle:setting:setting.html.twig', 
                array(
                    'status' => $status,
                    'error' => $error,
                    'title' => 'Configurações',
                    'form' => $form->createView(),
        ));
    }

}
