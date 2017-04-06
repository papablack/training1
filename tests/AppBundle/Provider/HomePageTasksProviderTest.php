<?php
namespace Tests\AppBundle\Provider;
use AppBundle\Provider\HomePageTasksProvider;
use AppBundle\Entity\Note;

use Mockery as m;

class HomePageTasksProviderTest extends WebTestCase
{
    public function testInitialize(){
        $task1 = new Note();
        $task1->setDescription('London');
        
        $task2 = new Note();
        $task2->setDescription('Warsaw');
        
        $userTasksProvider = m::mock(\AppBundle\Provider\UserTasksProvider::class);
        $userTasksProvider->shouldRecieve('provide')->once()->andReturn([$task1,$task2]);
        
        $temperatureProvider->shouldRecieve('getByLocation')->withArgs(['London'])->andReturn(1);
        $temperatureProvider->shouldRecieve('getByLocation')->withArgs(['Warsaw'])->andReturn(2);
        
    }
}