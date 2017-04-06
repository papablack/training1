<?php

namespace Tests\AppBundle\Controller;

use AppBundle\DataFixtures\ORM\Users;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
//
//    public function testIndex()
//    {
//        $client = $this->makeClient();
//
//        $crawler = $client->request('GET', '/note');
//
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
//    }

    public function testIndexNotLogged()
    {
        $fixtures = $this->loadFixtures(array(Users::class))->getReferenceRepository();

        $client = $this->makeClient();

        $crawler = $client->request('GET', '/note');

        $this->assertStatusCode(302, $client);
    }

}
