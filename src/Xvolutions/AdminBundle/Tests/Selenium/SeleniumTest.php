<?php

namespace Xvolutions\AdminBundle\Tests\Selenium;

use PHPUnit_Extensions_SeleniumTestCase;

/**
 * Description of SeleniumTest
 *
 * @author pedroresende
 */
class SeleniumTest extends PHPUnit_Extensions_SeleniumTestCase
{
    const username = 'admin';
    const password = 'adminpass';

    protected function setUp() {
        $this->setBrowser("*firefox");
        $this->setBrowserUrl("http://localhost:8000/");
        $this->setHost('192.168.1.114');
        $this->setPort(4444);
    }
}
