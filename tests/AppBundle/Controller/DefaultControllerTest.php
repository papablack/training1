<?php

namespace Tests\AppBundle\Controller;

use AppBundle\DataFixtures\ORM\Users;
use AppBundle\Entity\User;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    public function testIndexNotLogged()
    {
        $fixtures = $this->loadFixtures(array(Users::class))->getReferenceRepository();

        $client = $this->makeClient();

        $crawler = $client->request('GET', '/note');

        $this->assertStatusCode(302, $client);
    }

    public function testIndexLogged()
    {
        $fixtures = $this->loadFixtures(array(Users::class))->getReferenceRepository();

        /** @var User $user1 */
        $user1 = $fixtures->getReference('training1');


        $client = $this->makeClient(array(
            'username'=> $user1->getUsername(),
            'password' => 'polcode',
        ));

        $crawler = $client->request('GET', '/note/');

        $this->assertStatusCode(200, $client);
        $this->assertContains('No notes', $crawler->filter('p')->text());
    }

}
