<?php

namespace Tests\AppBundle\Controller;

use AppBundle\DataFixtures\ORM\Users;
use FOS\UserBundle\Model\UserInterface;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class NoteControllerTest extends WebTestCase
{

    /**
     * @group functional
     */
    public function testIndexNotLogged()
    {
        $fixtures = $this->loadFixtures(array(Users::class))->getReferenceRepository();

        $client = $this->makeClient();

        $crawler = $client->request('GET', '/note');

        $this->assertStatusCode(302, $client);
    }

    /**
     * @group functional
     */
    public function testIndexLogged()
    {
        $fixtures = $this->loadFixtures(array(Users::class))->getReferenceRepository();

        /** @var UserInterface $user1 */
        $user1 = $fixtures->getReference('training1');
        //$this->loginAs($user1, 'main');

        $client = $this->makeClient(array(
            'username' => $user1->getUsername(),
            'password' => 'polcode',
        ));
        $crawler = $client->request('GET', '/note/');

        $this->assertStatusCode(200, $client);
        $this->assertContains('No notes', $crawler->filter('p')->text());
    }

    /**
     * @group functional
     */
    public function testNote()
    {
        $fixtures = $this->loadFixtures(array(Users::class))->getReferenceRepository();

        /** @var UserInterface $user1 */
        $user1 = $fixtures->getReference('training1');
        ///$this->loginAs($user1, 'main');

        $client = $this->makeClient(array(
            'username' => $user1->getUsername(),
            'password' => 'polcode',
        ));
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/note/');
        $this->assertStatusCode(200, $client);

        $form = $crawler->selectButton('Submit')->form();

        $form->setValues(array('app_note'=> array('content' => 'Hello')));
        $crawler = $client->submit($form);

        $this->assertStatusCode(200, $client);

        $this->assertCount(1, $crawler->filter('li'));
        $this->assertContains('Hello', $crawler->filter('li')->first()->text());
    }

}
