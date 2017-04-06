<?php
namespace AppBundle\Provider;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use AppBundle\Repository\NoteRepository;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WeatherService
 *
 * @author needit
 */
class HomePageTasksProvider {
    
    private $tasksProvider;
    private $temperatureProvider;
    
    public function __construct(
        UserTasksProvider $userTasksProvider,
        TemperatureProviderInterface $temperatureProvider
    )
    {
        $this->tasksProvider = $userTasksProvider;
        $this->temperatureProvider = $temperatureProvider;
    }
    
    public function provide(){
        
    }
}
