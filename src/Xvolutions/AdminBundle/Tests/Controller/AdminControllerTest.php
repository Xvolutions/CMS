<?php

namespace Xvolutions\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of AdminControllerTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class AdminControllerTest extends WebTestCase {

    public function testbackoffice() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/backoffice');

        $this->assertTrue( $client->getResponse()->isRedirect('/admin') );

        $this->assertTrue($crawler->filter('html:contains("Consola de Gestão")')->count() > 0);

        $buttonCrawlerNode = $crawler->selectButton('submit');
        $form = $buttonCrawlerNode->form();
        $client->submit($form, array(
            'username'  => 'admin',
            'password'  => 'adminpass',
        ));
    }

}
