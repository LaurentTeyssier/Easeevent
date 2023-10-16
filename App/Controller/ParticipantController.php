<?php
namespace App\Controller;
use App\vue\Template;
use App\Model\Participant;
use App\Utils\Utilitaire;
class ParticipantController extends Participant{
    public function addParticipant(){
        $error = "";
        //Tester si le form est submit
        if(isset($_POST['submit'])){
            //Tester si les champs sont remplis
           if(!empty($_POST['firstname_participant']) && !empty($_POST['name_participant'])&& !empty($_POST['email_participant'])&& !empty($_POST['phone_participant']) && !empty($_POST['password_participant'])&& !empty($_POST['repeat_password_participant'])) {
            //Tester si les mdp correspondent
            if($_POST['password_participant']==$_POST['repeat_password_participant']){
            //Setter les valeurs de l'objet participantController
            $this->setFirstname(Utilitaire::cleanInput($_POST['firstname_participant']));
            $this->setName(Utilitaire::cleanInput($_POST['name_participant']));
            $this->setEmail(Utilitaire::cleanInput($_POST['email_participant']));
            $this->setPhone(Utilitaire::cleanInput($_POST['phone_participant']));
            
            
           
            //tester si le participant existe
            if(!$this->findOneBy()){
                if($_FILES['picture_participant']['tmp_name'] != ""){
                    $ext = Utilitaire::getFileExtension($_FILES['picture_participant']['name']);
                    if($ext=='png' OR $ext =='PNG' OR $ext = 'jpg' OR $ext =='JPG'OR $ext =='jpeg' OR $ext == 'JPEG' OR $ext=='bmp' OR $ext=='BMP'){
                        $this->setPicture($_FILES['picture_participant']['name']);
                        move_uploaded_file($_FILES['picture_participant']['tmp_name'], './Public/asset/images/'.$_FILES['picture_participant']['name']);
                    }
                    else{
                        $error = 'format incorrect';
                        $this->setPicture('test.png');
                    }
                }
                else{
                    $this->setPicture('test.png');
                }
                //hasher le password
                $this->setPassword(Utilitaire::cleanInput(password_hash($_POST['password_participant'], PASSWORD_DEFAULT)));
                $this->add();
                $error = "Le participant a été ajouté en BDD";
            } else {
                
                $error = "Le participant existe déjà";
            }
        }else {
            $error = "Les mots de passe ne correspondent pas.";
        }
            
           }else {
            $error = "Veuillez renseigner tous les champs du formulaire.";
           }
        }
        Template::render('header.php', 'Inscription', 'vueAddParticipant.php', 'footer.php', 
        $error, 'script.js', 'style.css');
        // include './App/Vue/vueAddParticipant.php';
    }

    public function connexionParticipant(){   
        $error ="";
        //tester si le formulaire est submit
        if(isset($_POST['submit'])){
            //tester si les champs sont remplis
            if(!empty($_POST['email_participant']) AND !empty($_POST['password_participant'])){
                //tester si le compte existe (findOneBy du model)
                $this->setEmail(Utilitaire::cleanInput($_POST['email_participant']));
                $user = $this->findOneBy();
                if($user){
                    //tester si le mot de passe correspond (password_verify)
                    if(password_verify(Utilitaire::cleanInput($_POST['password_participant']), $user->getPassword())){
                        $error = "Connecté";
                        $_SESSION['connected'] = true;
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['nom'] = $user->getName();
                        $_SESSION['prenom'] = $user->getFirstname();
                        $_SESSION['image'] = $user->getPicture();

                        $error = "Vous êtes connecté";
                        header('Location: ./');
                    }else {
                        $error = "Les informations de connexion ne sont pas valides";
                    }
                }else{
                    $error = "Les informations de connexion ne sont pas valides";
                }
            }else{
                $error = "Veuillez renseigner tous les champs du formulaire";
            }
            
        }
        Template::render('header.php', 'Connexion', 'vueConnectParticipant.php', 'footer.php', 
        $error, 'script.js', 'style.css');
        
}
}