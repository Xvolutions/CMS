<?php

namespace Xvolutions\AdminBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Xvolutions\AdminBundle\Command\InitiateCommand;

/**
 * Description of InitiateCommandTest
 *
 * @author Pedro Resende <pedro.resende@ez.no>
 */
class InitiateCommandTest extends WebTestCase
{

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
    }

    public function testActivation()
    {
        $command = new InitiateCommand();
        $application = new Application( static::$kernel );
        $command->setApplication( $application );
        $commandTester = new CommandTester( $command );
        $commandTester->execute( array( 'command' => $command->getName() ) );
        $this->assertRegExp( '/Secções Adicionadas\\nPáginas Adicionadas\\nÍdiomas Adicionados\\n*/', $commandTester->getDisplay(), 'test passed' );
    }

}
