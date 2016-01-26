<?php

namespace Xvolutions\AdminBundle\Tests\Entity;

use Xvolutions\AdminBundle\Entity\Section;

/**
 * Description of SectionTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class SectionTest extends \PHPUnit_Framework_TestCase
{
    public function testsection()
    {
        $section = new Section();
        $section->setSection("Test");
        $this->assertTrue($section->getSection() == "Test");
    }
}
