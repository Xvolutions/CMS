<?php

namespace Xvolutions\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xvolutions\AdminBundle\Entity\Page;
use Xvolutions\AdminBundle\Entity\Section;

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
        ;
    }

    protected function execute( InputInterface $input, OutputInterface $output )
    {
        $this->initiateSections( $output );
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
                $em->flush();
            }
            $output->writeln( 'Secções Adicionadas' );
        } catch ( Exception $ex ) {
            $output->writeln( "Erro ao adicionar as secções base -> $ex" );
        }
    }

    private function initiatePages( &$output )
    {
        try {
            $sectionList = $this->getContainer()->get( 'doctrine' )->getManager( 'default' )->getRepository( 'XvolutionsAdminBundle:Section' )->findBy( array( 'section' => 'Pública' ) );

            $em = $this->getContainer()->get( 'doctrine' )->getManager( 'default' );

            $pages = array( 'Raiz', '-----' );
            foreach ( $pages as $p ) {
                $page = new Page();
                $page->setTitle( $p );
                $page->setUrl( $p );
                $page->setId_parent( 0 );
                $datetime = new \DateTime( 'now' );
                $page->setId_section( $sectionList[ 0 ]->getId() );
                $page->setDate( $datetime );
                $em->persist( $page );
                $em->flush();
            }
            $output->writeln( 'Páginas Adicionadas' );
        } catch ( Exception $ex ) {
            $output->writeln( "Erro ao adicionar as páginas base -> $ex" );
        }
    }

}
