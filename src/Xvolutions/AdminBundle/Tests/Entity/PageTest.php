<?php

namespace Xvolutions\AdminBundle\Tests\Entity;

use Xvolutions\AdminBundle\Entity\Page;

/**
 * Description of PagesTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class PagesTest extends \PHPUnit_Framework_TestCase {

    public function testid() {
        $page = new Page();
        $page->setTitle("test");
        $page->setUrl("test");
        $page->setIdsection(1);
        $page->setIdparent(1);
        $page->setIdlanguage(1);
        $datetime = new \DateTime('now');
        $page->setDate($datetime);
    }

    public function testtitle() {
        $page = new Page();
        $page->setTitle("Title");
        $title = $page->getTitle();
        $this->assertTrue($title == "Title");
    }

    public function testurl() {
        $page = new Page();
        $page->setUrl("http://localhost/");
        $url = $page->getUrl();
        $this->assertTrue($url == "http://localhost/");
    }

    public function testtext() {
        $page = new Page();
        $page->setText("This is some ramdom text");
        $text = $page->getText();
        $this->assertTrue($text == "This is some ramdom text");
    }

    public function testsection() {
        $page = new Page();
        $page->setIdsection(1);
        $id_section = $page->getIdsection();
        $this->assertTrue($id_section == 1);
    }

    public function testparent() {
        $page = new Page();
        $page->setIdparent(1);
        $id_parent = $page->getIdparent();
        $this->assertTrue($id_parent == 1);
    }

    public function testlanguage() {
        $page = new Page();
        $page->setIdlanguage(1);
        $id_language = $page->getIdlanguage();
        $this->assertTrue($id_language == 1);
    }

    public function testdate() {
        $page = new Page();
        $datetime = new \DateTime('now');
        $page->setDate($datetime);
        $date = $page->getDate();
        $this->assertTrue($date == $datetime);
    }

}
