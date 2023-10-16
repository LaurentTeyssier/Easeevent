<?php
namespace App\Controller;
use App\vue\Template;
class HomeController{
    public function getHome(){
        $error = "";
        Template::render('header.php', 'Accueil', 'home.php', 'footer.php', 
        $error, 'script.js', 'style.css');
    }
    public function get404(){
        $error = "";
        Template::render('header.php', 'Error 404', 'vueError.php', 'footer.php', 
        $error, 'script.js', 'style.css');
    }
}
?>