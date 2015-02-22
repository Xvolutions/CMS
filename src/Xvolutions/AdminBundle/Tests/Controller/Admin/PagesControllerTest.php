<?php

namespace Xvolutions\AdminBundle\Tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PagesControllerTest extends WebTestCase
{

    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testPagesEmptyAction()
    {
        $crawler = $this->client->request('GET', '/admin/backoffice', array(), array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW' => 'adminpass',
        ));

        $this->assertEquals(
                Response::HTTP_OK, $this->client->getResponse()->getStatusCode()
        );

        $this->assertGreaterThan(
                0, $crawler->filter('html:contains("Consola de Gestão")')->count()
        );

        $this->client->request('GET', '/admin/pages/');

        $this->assertEquals(
                Response::HTTP_OK, $this->client->getResponse()->getStatusCode()
        );
    }

}
