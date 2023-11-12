<?php
namespace App\Controller;
use App\vue\Template;
use App\Model\Event;
use App\Utils\Utilitaire;
class EventController extends Event{
    public function addEvent(){
        $error = "";
        //Tester si le form est submit
        if(isset($_POST['submit'])){
            //Tester si les champs sont remplis
           if(!empty($_POST['title_event']) && !empty($_POST['place_event'])&& !empty($_POST['begin_date_event'])&& !empty($_POST['end_date_event']) && !empty($_POST['description_event'])) {
           
            //Setter les valeurs de l'objet eventController
            $this->setTitle(Utilitaire::cleanInput($_POST['title_event']));
            $this->setPlace(Utilitaire::cleanInput($_POST['place_event']));
            $this->setBeginDate(Utilitaire::cleanInput($_POST['begin_date_event']));
            $this->setEndDate(Utilitaire::cleanInput($_POST['end_date_event']));
            $this->setDescription(Utilitaire::cleanInput($_POST['description_event']));
            
            
           
            //tester si le compte existe
            if(!$this->findOneBy()){
                
                
                $this->add();
                $error = "L'événement a été ajouté en BDD";
            } else {
                
                $error = "L'événement existe déjà";
            }
        
            
           }else {
            $error = "Veuillez renseigner tous les champs du formulaire.";
           }
        }
        Template::render('header.php', 'Nouvel événement', 'vueAddEvent.php', 'footer.php', 
        $error, 'script.js', 'style.css');
    }

    public function getAllEvents(){
        $error = "";
        $events =$this->findAll();
        
        
        if(empty($events)){
            $error = "Aucun événement.";
        }
        Template::render('header.php', 'Mes événements', 'vueAllEvent.php', 'footer.php', 
        $error, 'script.js', 'style.css', $events);
    }
}