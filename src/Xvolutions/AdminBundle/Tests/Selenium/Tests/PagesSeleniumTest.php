<?php

namespace Xvolutions\AdminBundle\Tests\Controller\Admin;

use Xvolutions\AdminBundle\Tests\Selenium\SeleniumTest;

class PagesSeleniumTest extends SeleniumTest
{

    public function testAddPagesAction()
    {
        $this->open("/admin/");
        $this->type("id=username", parent::username);
        $this->type("id=password", parent::password);
        $this->click("css=button.btn.btn-primary");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Backoffice | Consola de Gestão", $this->getTitle());
        $this->clickAt("link=CMS", "");
        $this->click("link=Páginas");
        $this->waitForPageToLoad("30000");
        $this->click("link=Criar uma nova página");
        $this->waitForPageToLoad("30000");
        $this->type("id=xvolutions_adminbundle_page_title", "test selenium");
        $this->type("id=xvolutions_adminbundle_page_idalias", "test-selenium");
        $this->runScript("tinyMCE.activeEditor.setContent('Test Selenium')");
        $this->select("id=xvolutions_adminbundle_page_id_language", "label=Português");
        $this->select("id=xvolutions_adminbundle_page_id_section", "label=Pública");
        $this->select("id=xvolutions_adminbundle_page_id_status", "label=Publicado");
        $this->click("id=xvolutions_adminbundle_page_Criar");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("test selenium", $this->getTable("css=table.table.table-hover.1.1"));
        $this->clickAt("link=Bem-vindo, Administrator", "");
        $this->click("link=Logout");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Login | Consola de Gestão", $this->getTitle());
    }

    public function testVerifyPagesAction()
    {
        $this->open("/admin/");
        $this->type("id=username", parent::username);
        $this->type("id=password", parent::password);
        $this->click("css=button.btn.btn-primary");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Backoffice | Consola de Gestão", $this->getTitle());
        $this->clickAt("link=CMS", "");
        $this->click("link=Páginas");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("test selenium", $this->getTable("css=table.table.table-hover.1.1"));
        $this->assertEquals("Pública", $this->getTable("css=table.table.table-hover.1.2"));
        $this->assertEquals("Publicado", $this->getTable("css=table.table.table-hover.1.3"));
        $this->assertEquals("Português", $this->getTable("css=table.table.table-hover.1.4"));
        $this->assertEquals("Editar Apagar", $this->getTable("css=table.table.table-hover.1.6"));
        $this->assertEquals("Editar Apagar", $this->getTable("css=table.table.table-hover.1.6"));
        $this->click("link=Editar");
        $this->waitForPageToLoad("30000");
        try {
            $this->assertEquals("test-selenium", $this->getValue("id=xvolutions_adminbundle_page_idalias"));
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            array_push($this->verificationErrors, $e->toString());
        }
        $this->click("link=Ver Páginas");
        $this->waitForPageToLoad("30000");
        $this->clickAt("link=Bem-vindo, Administrator", "");
        $this->click("link=Logout");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Login | Consola de Gestão", $this->getTitle());
    }

    public function testDeletePagesAction()
    {
        $this->open("/admin/");
        $this->type("id=username", parent::username);
        $this->type("id=password", parent::password);
        $this->click("css=button.btn.btn-primary");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Backoffice | Consola de Gestão", $this->getTitle());
        $this->clickAt("link=CMS", "");
        $this->click("link=Páginas");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("test selenium", $this->getTable("css=table.table.table-hover.1.1"));
        $this->assertEquals("Pública", $this->getTable("css=table.table.table-hover.1.2"));
        $this->assertEquals("Publicado", $this->getTable("css=table.table.table-hover.1.3"));
        $this->assertEquals("Português", $this->getTable("css=table.table.table-hover.1.4"));
        $this->assertEquals("Editar Apagar", $this->getTable("css=table.table.table-hover.1.6"));
        $this->assertEquals("Editar Apagar", $this->getTable("css=table.table.table-hover.1.6"));
        $this->click("link=Apagar");
        $this->assertEquals("Página removida com sucesso", $this->getText("id=text"));
        $this->assertFalse($this->isTextPresent("css=table.table.table-hover.1.1"));
        $this->clickAt("link=Bem-vindo, Administrator", "");
        $this->click("link=Logout");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Login | Consola de Gestão", $this->getTitle());
    }

}
