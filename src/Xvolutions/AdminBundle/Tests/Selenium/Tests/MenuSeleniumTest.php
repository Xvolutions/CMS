<?php

namespace Xvolutions\AdminBundle\Tests\Selenium\Tests;

use Xvolutions\AdminBundle\Tests\Selenium\SeleniumTest;
use Xvolutions\AdminBundle\Tests\Selenium\Tests\PagesSeleniumTest;

/**
 * Description of MenuSeleniumTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 * @date Sep 27, 2015 - 3:18:45 AM 
 */
class MenuSeleniumTest extends SeleniumTest
{
    /**
     * This test will verify if the pages and the menu areas are present
     * 
     */
    public function testmenuAction()
    {
        parent::login();
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->isElementPresent("id=sortable1");
        $this->isElementPresent("id=sortable2");
        parent::logout();
    }

    /**
     * This test will verify if a menu item is added, after reloading the
     * menu page it will be present on the menu are but not on the page area
     * 
     */
    public function testAddMenuAction()
    {
        parent::login();
        $this->clickAt("link=CMS", "");
        $this->click("link=Páginas");
        $this->waitForPageToLoad("30000");
        $this->click("link=Criar uma nova página");
        $this->waitForPageToLoad("30000");
        $this->type("id=xvolutions_adminbundle_page_title", "Test Menu Selenium 1");
        $this->type("id=xvolutions_adminbundle_page_idalias", "test-menu-selenium-1");
        $this->runScript("tinyMCE.activeEditor.setContent('Test Menu Selenium 1')");
        $this->select("id=xvolutions_adminbundle_page_id_language", "label=Português");
        $this->select("id=xvolutions_adminbundle_page_id_section", "label=Pública");
        $this->select("id=xvolutions_adminbundle_page_id_status", "label=Publicado");
        $this->click("id=xvolutions_adminbundle_page_Criar");
        $this->waitForPageToLoad("30000");
        $this->click("link=Criar uma nova página");
        $this->waitForPageToLoad("30000");
        $this->type("id=xvolutions_adminbundle_page_title", "Test Menu Selenium 2");
        $this->type("id=xvolutions_adminbundle_page_idalias", "test-menu-selenium-2");
        $this->runScript("tinyMCE.activeEditor.setContent('Test Menu Selenium 2')");
        $this->select("id=xvolutions_adminbundle_page_id_language", "label=Português");
        $this->select("id=xvolutions_adminbundle_page_id_section", "label=Pública");
        $this->select("id=xvolutions_adminbundle_page_id_status", "label=Publicado");
        $this->click("id=xvolutions_adminbundle_page_Criar");
        $this->waitForPageToLoad("30000");
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->isElementPresent("css=ul#sortable1.connectedSortable.ui-sortable li#id-1.ui-state-default.ui-sortable-handle");
        $this->assertElementContainsText("css=ul#sortable1.connectedSortable.ui-sortable li#id-1.ui-state-default.ui-sortable-handle", "Test Menu Selenium 1");
        $this->isElementPresent("css=ul#sortable1.connectedSortable.ui-sortable li#id-2.ui-state-default.ui-sortable-handle");
        $this->assertElementContainsText("css=ul#sortable1.connectedSortable.ui-sortable li#id-2.ui-state-default.ui-sortable-handle", "Test Menu Selenium 2");
        parent::logout();
    }

    /**
     * This test will verify that if a menu item is removed, after reloading
     * the menu page it won't be in the menu area but in the page area
     */
    public function testRemoveMenuAction()
    {
        parent::login();
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->dragAndDropToObject("css=ul#sortable1.connectedSortable.ui-sortable li#id-1", "css=ul#sortable2");
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->assertFalse($this->isElementPresent("css=ul#sortable1.connectedSortable.ui-sortable li#id-1.ui-state-default.ui-sortable-handle"));
        $this->isElementPresent("css=ul#sortable2.connectedSortable.ui-sortable li#id-1.ui-state-default.ui-sortable-handle");
        $this->assertElementContainsText("css=ul#sortable2.connectedSortable.ui-sortable li#id-1.ui-state-default.ui-sortable-handle", "Test Menu Selenium 1");
        parent::logout();
    }

    /**
     * This test will verify that if a menu is reordered it will remaing in the
     * correct order after reloading the menu page
     */
    public function testReOrderMenuAction()
    {
        parent::login();
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->dragAndDropToObject("css=ul#sortable1.connectedSortable.ui-sortable li#id-2", "css=ul#sortable2");
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->assertFalse($this->isElementPresent("css=ul#sortable1.connectedSortable.ui-sortable li#id-2.ui-state-default.ui-sortable-handle"));
        $this->isElementPresent("css=ul#sortable2.connectedSortable.ui-sortable li#id-2.ui-state-default.ui-sortable-handle");
        $this->assertElementContainsText("css=ul#sortable2.connectedSortable.ui-sortable li#id-2.ui-state-default.ui-sortable-handle", "Test Menu Selenium 2");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/ul[2]/li[1]", "Test Menu Selenium 2");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/ul[2]/li[2]", "Test Menu Selenium 1");
        $this->dragAndDropToObject("css=ul#sortable2.connectedSortable.ui-sortable li#id-1", "css=ul#sortable1");
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->dragAndDropToObject("css=ul#sortable1.connectedSortable.ui-sortable li#id-1", "css=ul#sortable2");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/ul[2]/li[1]", "Test Menu Selenium 1");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/ul[2]/li[2]", "Test Menu Selenium 2");
        parent::logout();
    }

    public function testPageRemovalMenuDisapears()
    {
        parent::login();
        $this->clickAt("link=CMS", "");
        $this->click("link=Páginas");
        $this->waitForPageToLoad("30000");
        $this->isElementPresent("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[3]/td[2]");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[3]/td[2]", "Test Menu Selenium 1");
        $this->isElementPresent("xpath=/html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[3]/td[7]/a[2]");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[3]/td[7]/a[2]", "Apagar");
        $this->click("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[3]/td[7]/a[2]");
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->assertFalse($this->isElementPresent("css=ul#sortable1.connectedSortable.ui-sortable li#id-1.ui-state-default.ui-sortable-handle"));
        $this->assertFalse($this->isElementPresent("css=ul#sortable2.connectedSortable.ui-sortable li#id-1.ui-state-default.ui-sortable-handle"));
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/ul[2]/li[1]", "Test Menu Selenium 2");

        $this->clickAt("link=CMS", "");
        $this->click("link=Páginas");
        $this->waitForPageToLoad("30000");
        $this->isElementPresent("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[2]/td[2]");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[2]/td[2]", "Test Menu Selenium 2");
        $this->isElementPresent("xpath=/html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[2]/td[7]/a[2]");
        $this->assertElementContainsText("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[2]/td[7]/a[2]", "Apagar");
        $this->click("xpath=//html/body/div[1]/div[2]/div/div/div[2]/table/tbody/tr[2]/td[7]/a[2]");
        $this->clickAt("link=CMS", "");
        $this->click("link=Menus");
        $this->waitForPageToLoad("30000");
        $this->assertFalse($this->isElementPresent("css=ul#sortable1.connectedSortable.ui-sortable li#id-2.ui-state-default.ui-sortable-handle"));
        $this->assertFalse($this->isElementPresent("css=ul#sortable2.connectedSortable.ui-sortable li#id-2.ui-state-default.ui-sortable-handle"));
        parent::logout();
    }
}
