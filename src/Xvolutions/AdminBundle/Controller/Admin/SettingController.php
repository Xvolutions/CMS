<?php

namespace Xvolutions\AdminBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xvolutions\AdminBundle\Controller\General;
use Xvolutions\AdminBundle\Entity\Setting;
use Xvolutions\AdminBundle\Form\SettingType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of SettingController
 *
 * @author pedroresende
 */
class SettingController extends Controller
{
    use General;

    public function editSettingAction(Request $request, $id = 1)
    {
        $this->verifyaccess();

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
                $error = 'Erro ao actualizar as configurações';
            }
        }

        return $this->render(
                        'XvolutionsAdminBundle:setting:setting.html.twig', array(
                    'status' => $status,
                    'error' => $error,
                    'title' => 'Configurações',
                    'form' => $form->createView(),
        ));
    }

    public function menuAction()
    {
        $this->verifyaccess();

        $setting = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:Setting')->find(1);
        if ($setting == null) {
            $blog = false;
        } else {
            $blog = $setting->getBlog();
        }

        return new Response((string) $blog);
    }
}
