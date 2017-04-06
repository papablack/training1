<?php
namespace Tests\AppBundle\Provider;
use AppBundle\Provider\HomePageTasksProvider;
use AppBundle\Entity\Note;

use Mockery as m;

class UserTasksProviderTest extends WebTestCase
{
    public function testInitialize(){
        $tokenStorage = Mock::m(\AppBundle\Provider\UserTasksProvider::class);
        $tokenStorage->shouldReceive('getToken')->andReturnNull();
        
        $tasksRepository = m::mock(\AppBundle\Repository\NoteRepository::class);
        $provider = new AppBundle\Provider\UserTasksProvider($tokenStorage, $tasksRepository);
        
    }
}