<?php

namespace Xvolutions\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Description of AdminControllerTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class AdminControllerTest extends WebTestCase {

    private $client = null;

    public function setUp() {
        $this->client = static::createClient();
    }

    public function testFailBackoffice() {
        $crawler = $this->client->request('GET', '/admin/backoffice', array(), array(), array(
        ));

        $this->assertEquals(
                Response::HTTP_FOUND, $this->client->getResponse()->getStatusCode()
        );
    }

    public function testBackoffice() {
        $crawler = $this->client->request('GET', '/admin/backoffice', array(), array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW' => 'adminpass',
        ));

        $this->assertEquals(
                Response::HTTP_OK, $this->client->getResponse()->getStatusCode()
        );

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Consola de Gestão")')->count());

        $this->client->request('GET', '/admin/logout');

        $this->assertEquals(
                Response::HTTP_FOUND, $this->client->getResponse()->getStatusCode()
        );
    }

    public function testSetup() {
        $crawler = $this->client->request('GET', '/admin/backoffice', array(), array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW' => 'adminpass',
        ));

        $this->assertEquals(
                Response::HTTP_OK, $this->client->getResponse()->getStatusCode()
        );

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Consola de Gestão")')->count());

        $this->client->request('GET', '/admin/setup');

        $this->assertEquals(
                Response::HTTP_OK, $this->client->getResponse()->getStatusCode()
        );

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Setup")')->count());
    }

    public function testPhpinfo() {
        $crawler = $this->client->request('GET', '/admin/backoffice', array(), array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW' => 'adminpass',
        ));

        $this->assertEquals(
                Response::HTTP_OK, $this->client->getResponse()->getStatusCode()
        );

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Consola de Gestão")')->count());

        $this->client->request('GET', '/admin/phpinfo');

        $this->assertEquals(
                Response::HTTP_OK, $this->client->getResponse()->getStatusCode()
        );

        $this->assertGreaterThan(0, $crawler->filter('html:contains("HTTP Headers Information")')->count());
    }

}
