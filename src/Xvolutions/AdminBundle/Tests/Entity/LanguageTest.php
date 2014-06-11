<?php

namespace Xvolutions\AdminBundle\Tests\Entity;

use Xvolutions\AdminBundle\Entity\Language;

/**
 * Description of LanguageTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class LanguageTest extends \PHPUnit_Framework_TestCase {

    public function testlanguage() {
        $language = new Language();
        $language->setLanguage("PT");
        $language->getLanguage();
    }

    public function testcode() {
        $language = new Language();
        $language->setCode("pt-PT");
        $language->getCode();
    }
}
