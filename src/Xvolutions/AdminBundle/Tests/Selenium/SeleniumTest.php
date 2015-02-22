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
    protected function setUp() {
        $this->setBrowser("*firefox");
        $this->setBrowserUrl("http://localhost:8000/");
    }

    public static $seleneseDirectory = 'Tests/';
}
