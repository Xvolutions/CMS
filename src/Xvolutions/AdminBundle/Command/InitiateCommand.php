<?php

namespace Xvolutions\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xvolutions\AdminBundle\Entity\Page;
use Xvolutions\AdminBundle\Entity\Section;
use Xvolutions\AdminBundle\Entity\Language;
use Xvolutions\AdminBundle\Entity\User;
use Xvolutions\AdminBundle\Entity\Role;

/**
 * Description of InitiateCommand
 *
 * @author Pedro Resende <pedro.resende@ez.no>
 */
class InitiateCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName( 'xvolutions:admin:initiate' )
                ->setDescription( 'This command will populate the Database' )
                ->addArgument('username', InputArgument::REQUIRED, 'Nome do Utilizador')
                ->addArgument('name', InputArgument::REQUIRED, 'Nome completo')
                ->addArgument('password', InputArgument::REQUIRED, 'Palavra chave')
                ->addArgument('email', InputArgument::REQUIRED, 'Email')
        ;
    }

    protected function execute( InputInterface $input, OutputInterface $output )
    {
        $username = $input->getArgument('username');
        $name = $input->getArgument('name');
        $password = $input->getArgument('password');
        $email = $input->getArgument('email');
        $this->initiateRoles( $output );
        $this->initiateUsers( $output, $username, $name, $password, $email );
        $this->initiateSections( $output );
        $this->initiateLanguages( $output );
        $this->initiatePages( $output );
    }

    private function initiateSections( &$output )
    {
        try {
            $em = $this->getContainer()->get( 'doctrine' )->getManager( 'default' );

            $sections = array( 'Pública', 'Privada' );
            foreach ( $sections as $s ) {
                $section = new Section();
                $section->setSection( $s );
                $em->persist( $section );
                $em->flush( $section );
            }
            $output->writeln( 'Secções Adicionadas' );
        } catch ( Exception $ex ) {
            $output->writeln( "Erro ao adicionar as secções base -> $ex" );
        }
    }

    private function initiatePages( &$output )
    {
        try {
            $em = $this->getContainer()->get( 'doctrine' )->getManager( 'default' );
            $sectionList = $this->getContainer()->get( 'doctrine' )->getRepository( 'XvolutionsAdminBundle:Section' )->find( 0 );
            $languageList = $this->getContainer()->get( 'doctrine' )->getRepository( 'XvolutionsAdminBundle:Language' )->find( 0 );
            $pages = array( '-----' );
            foreach ( $pages as $p ) {
                $page = new Page();
                $page->setTitle( $p );
                $page->setUrl( $p );
                $page->setIdparent( 0 );
                $page->setIdlanguage( $languageList[0] );
                $page->setIdsection( $sectionList[0] );
                $datetime = new \DateTime( 'now' );
                $page->setDate( $datetime );
                $em->persist( $page );
                $em->flush( $page );
            }
            $output->writeln( 'Páginas Adicionadas' );
        } catch ( Exception $ex ) {
            $output->writeln( "Erro ao adicionar as páginas base -> $ex" );
        }
    }

    private function initiateLanguages( &$output )
    {
        try {
            $em = $this->getContainer()->get( 'doctrine' )->getManager( 'default' );

            $languages = array( 
                array(
                    'English', 
                    'en_GB'
                ), 
                array(
                    'Português', 
                    'pt-PT'
                )
            );
            
            foreach( $languages as $l) {
                $language = new Language();
                $language->setLanguage( $l[0] );
                $language->setCode( $l[1] );
                $em->persist( $language );
                $em->flush( $language );
            }
            $output->writeln( 'Ídiomas Adicionados' );
        } catch ( Exception $ex ) {
            $output->writeln( "Erro ao adicionar os idiomas base -> $ex" );
        }
    }

    private function initiateRoles( &$output )
    {
        try {
            $em = $this->getContainer()->get( 'doctrine' )->getManager( 'default' );

            $roles = array( 
                array(
                    'Admin', 
                    'ROLE_ADMIN'
                ), 
                array(
                    'User', 
                    'ROLE_USER'
                )
            );
            
            foreach( $roles as $r) {
                $role = new Role();
                $role->setName( $r[0] );
                $role->setRole( $r[1] );
                $em->persist( $role );
                $em->flush( $role );
            }
            $output->writeln( 'Grupos Adicionados' );
        } catch ( Exception $ex ) {
            $output->writeln( "Erro ao adicionar os grupos base -> $ex" );
        }
    }

    private function initiateUsers( &$output, $username, $name, $password, $email)
    {
        try {
            $role = $this->getContainer()->get( 'doctrine' )->getRepository( 'XvolutionsAdminBundle:Role' )->findAll();
            $role0 = $role[0];
            $users = array( 
                array(
                    $username,
                    $name,
                    $password,
                    $email,
                    '1',
                    array( $role0 )
                ), 
            );
            $em = $this->getContainer()->get( 'doctrine' )->getManager( 'default' );
            foreach( $users as $u) {
                $user = new User();
                $user->setUsername( $u[0] );
                $user->setName( $u[1] );
                $salt = md5(time());
                $user->setSalt($salt);

                $factory = $this->getContainer()->get('security.encoder_factory');
                $encoder = $factory->getEncoder( $user );
                $password = $encoder->encodePassword($u[2], $user->getSalt());
                $user->setPassword($password);

                $user->setEmail( $u[3] );
                $user->setIsactive( $u[4] );
                $user->setRoles( $u[5] );
                $em->persist( $user );
                $em->flush( $user );
            }
            $output->writeln( 'Utilizadores Adicionados' );
        } catch ( Exception $ex ) {
            $output->writeln( "Erro ao adicionar os utilizadores base -> $ex" );
        }
    }
}
