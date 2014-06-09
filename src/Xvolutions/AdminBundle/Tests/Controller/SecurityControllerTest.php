<?php

namespace Xvolutions\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of SecurityControllerTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class SecurityControllerTest extends WebTestCase {

    public function testlogin() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/');

        $this->assertTrue($crawler->filter('html:contains("Consola de Gestão")')->count() > 0);
    }

    public function testrecover() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/recover');

        $this->assertTrue($crawler->filter('html:contains("Consola de Gestão")')->count() > 0);
    }
}
