<?php

namespace Xvolutions\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Description of SecurityControllerTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class SecurityControllerTest extends WebTestCase {

    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testlogin() {
        $this->logIn();

        $crawler = $this->client->request('GET', '/admin/backoffice');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Consola de Gestão")')->count());
    }

    public function testrecover() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/recover');

        $this->assertTrue($crawler->filter('html:contains("Consola de Gestão")')->count() > 0);
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $firewall = 'secured_area';
        $token = new UsernamePasswordToken('admin', 'adminpass', $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}
