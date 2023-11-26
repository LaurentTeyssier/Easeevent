<?php
require_once './autoload.php';
require_once './vendor/autoload.php';
use App\Controller\ParticipantController;
use App\Controller\RolesController;
use App\Controller\EventController;
use App\Controller\HomeController;
$rolesController = new RolesController();
$participantController = new ParticipantController();
$eventController = new EventController();
$homeController = new HomeController();
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';


    if(isset($_SESSION['connected'])) {
    //routeur
        switch ($path) {
            case '/easeevent/':
                $homeController->getHome();
                break;
            case '/easeevent/participantadd':
                $participantController->addParticipant();
                break;
            case '/easeevent/roleadd':
                $rolesController->addRoles();
                break;    
            case '/easeevent/eventview':
                $eventController->getAllEvents();
                break;    
            case '/easeevent/eventadd':
                $eventController->addEvent();
                break;    
            case '/easeevent/participantdisconnect':
                $participantController->deconnexionParticipant();
                break;    
            default:
                $homeController->get404();
                break;
        }
    } else {
        switch ($path) {
            case '/easeevent/':
                $homeController->getHome();
                break;
            case '/easeevent/participantadd':
                $participantController->addParticipant();
                break;
            case '/easeevent/participantconnect':
                $participantController->connexionParticipant();
                break;
            default:
                $homeController->get404();
                break;
        }
    }

//     //Version connectée    

    