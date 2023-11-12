<?php
namespace App\vue;
class Template{
    public static function render($header,$title,$content,$footer,$error, $js, $css, $tab=null){
        if(file_exists('./App/Vue/'.$content)){
            include './App/Vue/'.$header;
            include './App/Vue/'.$footer;
            include './App/Vue/'.$content;
        }
        else{
            $header = "";
            $footer = "";
            $title = "Error 404";
            include './App/Vue/vueError.php';
        }
        include './App/Vue/vueTemplate.php';
    }
}
?>