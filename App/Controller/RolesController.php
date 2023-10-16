<?php
namespace App\Controller;
use App\vue\Template;
use App\Model\Role;
use App\Utils\Utilitaire;

class RolesController extends Role{
    public function addRoles(){
        $error = "";
        //Tester si le form est submit
        if(isset($_POST['submit'])){
            //Tester si les champs sont remplis
           if(!empty($_POST['name_role'])) {
            //Setter les valeurs de l'objet RolesController
            $this->setName(Utilitaire::cleanInput($_POST['name_role']));                 
             //tester si le rôle existe
            if(!$this->findOneBy()){              
                $this->add();
                $error = "Le rôle a été ajouté en BDD";
            } else {
                
                $error = "Le rôle existe déjà";
            }       
            
           }else {
            $error = "Veuillez renseigner le champ du formulaire.";
           }
        }
        // include './App/Vue/vueAddRoles.php';
        Template::render('header.php', 'Ajouter un rôle', 'vueAddRoles.php', 'footer.php', 
        $error, 'script.js', 'style.css');
    }
}