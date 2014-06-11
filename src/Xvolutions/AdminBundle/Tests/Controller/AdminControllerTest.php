<?php

namespace Xvolutions\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\DomCrawler\FormFieldRegistry;

/**
 * Description of AdminControllerTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class AdminControllerTest extends WebTestCase {

    public function testbackoffice() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/backoffice');

        $this->assertTrue( $client->getResponse()->isRedirect('http://localhost/admin/') );

        $this->assertFalse($crawler->filter('html:contains("Consola de Gestão")')->count() == 1);

        $dom = new \DOMDocument();

        $dom->loadHTML('<form method="post" action="/AdminBundle/web/app.php/admin/login_check">
                    <h2>Consola de Gestão</h2>
                                            <br><br>
                                        <div class="form-group">
                        <input type="text" placeholder="Username" value="" name="_username" id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="password" name="_password" placeholder="Password" id="password" class="form-control">
                    </div>
                    <input type="hidden" value="xx6ZlEJ-ZuO2mS9u5ameRXnKAJDfNOZ5FDxUrVfhgVY" name="_csrf_token">
                                        <button class="btn btn-primary" type="submit">login</button>
                    <button class="btn btn-bg" type="reset">reset</button>
                </form>');

        $nodes = $dom->getElementsByTagName( 'form' );
        $form = new Form($nodes->item(0), 'http://localhost/AdminBundle/web/app.php/admin/login_check');

        $form->setValues(array('_username' => 'admin', '_password' => 'adminpass'));

        $form = $client->submit($form);
//        var_dump( $client->getResponse() );
//        $this->assertTrue( $client->getResponse()->isRedirect('http://localhost/AdminBundle/web/app.php/admin/backoffice') );
    }

}
