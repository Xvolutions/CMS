<?php

namespace Xvolutions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Xvolutions\AdminBundle\Entity\User;

/**
 * Description of SecurityController
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class SecurityController extends Controller
{

    public function loginAction(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('backoffice');
        }
        $helper = $this->get('security.authentication_utils');

        $response = $this->render(
            'XvolutionsAdminBundle::login.html.twig',
            array(
                'last_username' => $helper->getLastUsername(),
                'error' => $helper->getLastAuthenticationError(),
            )
        );

        $response->setETag(md5($response->getContent()));
        $response->setPublic();
        $response->isNotModified($request);

        return $response;
    }

    public function recoverAction(Request $request)
    {
        $user = new User();

        if ($request->getMethod() == 'POST') {
            if ($request->request->get('_email') != null) {
                $email = $request->request->get('_email');
                $user = $this->getDoctrine()->getRepository('XvolutionsAdminBundle:User')->findBy(array('email' => $email));
                if (sizeof($user) > 0) {
                    $this->generatePasswordAndMail($user[0], $email);
                    return $this->render(
                        'XvolutionsAdminBundle::recover.html.twig', array(
                            'error' => '',
                            'info' => 'Palavra-chave recuperada com sucesso'
                        )
                    );
                } else {
                    return $this->render(
                        'XvolutionsAdminBundle::recover.html.twig', array(
                            'error' => 'E-mail não encontrado',
                            'info' => ''
                        )
                    );
                }
            } else {
                return $this->render(
                    'XvolutionsAdminBundle::recover.html.twig', array(
                        'error' => 'É necessario colocar um e-mail',
                        'info' => ''
                    )
                );
            }
        } else {
            return $this->render(
                'XvolutionsAdminBundle::recover.html.twig', array(
                    'error' => '',
                    'info' => ''
                )
            );
        }
    }

    private function generatePasswordAndMail(User $user, $email)
    {
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $salt = md5(time());
        $user->setSalt($salt);
        $generatepassword = $this->get('xvolutions_admin.misc')->randomPassword();
        $password = $encoder->encodePassword($generatepassword, $salt);
        $user->setPassword($password);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $message = \Swift_Message::newInstance()
                ->setSubject('Recuperaçao de palavra-chave')
                ->setFrom($this->container->getParameter('mailer_user'))
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                        'XvolutionsAdminBundle:email:recover.html.twig',
                        array(
                            'name' => $user->getName(),
                            'password' => $generatepassword
                        )
                    )
                )
                ->setContentType("text/html")
        ;
        $this->get('mailer')->send($message);
    }
}
