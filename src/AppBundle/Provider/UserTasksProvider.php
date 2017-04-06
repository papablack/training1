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
class UserTasksProvider {
    
    public function __construct(
            TokenStorageInterface $tokenStorage,
            NoteRepository $noteRepository
    );
    
    public function provide(){
        if(!$this->tokenStorage()){
            
        }
    }
}
