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

    protected function setUp()
    {
        $this->setBrowser("*firefox");
        $this->setBrowserUrl("http://localhost:8000/");
    }

    protected function login()
    {
        $this->open("/admin/");
        $this->type("id=username", self::username);
        $this->type("id=password", self::password);
        $this->click("css=button.btn.btn-primary");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Backoffice | Consola de Gestão", $this->getTitle());
    }

    protected function logout()
    {
        $this->click("link=Logout");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Login | Consola de Gestão", $this->getTitle());
    }

}
