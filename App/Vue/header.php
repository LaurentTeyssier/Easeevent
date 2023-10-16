<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <a id="logo" href="main.html"><span class="first_e">e</span><span class="second_e">e</span></a> -->
        <!-- <a href="./"><img src="Public/Content/logo_easeevent.png" alt="logo"></a>
        <h1>Eas<span class="first_e">e</span><span class="second_e">e</span>vent</h1>
        <div class="form_hdr">
            <div class="submit_hdr">
                <a href="./participantconnect"><input type="submit" value="Connexion" name="submit">
                <a href="./participantadd"><input type="submit" value="Inscription" name="submit"></a>
            </div>
            <a href="http://">Mot de passe oublié ?</a>
        </div>
    </header>
</body>
</html> --> 

<?php ob_start()?>
<?php if(isset($_SESSION['connected'])):?>
    <header>
    <a href="./"><img src="Public/Content/logo_easeevent.png" alt="logo"></a>
        <h1>Eas<span class="first_e">e</span><span class="second_e">e</span>vent</h1>
        <div class="form_hdr">
            <div class="submit_hdr">
                <a href="./participantdisconnect"><input type="submit" value="Déconnexion" name="submit">                
            </div>            
        </div>
        </header>
<?php else:?>
    <header>
    <a href="./"><img src="Public/Content/logo_easeevent.png" alt="logo"></a>
        <h1>Eas<span class="first_e">e</span><span class="second_e">e</span>vent</h1>
        <div class="form_hdr">
            <div class="submit_hdr">
                <a href="./participantconnect"><input type="submit" value="Connexion" name="submit">
                <a href="./participantadd"><input type="submit" value="Inscription" name="submit"></a>
            </div>
            <a href="http://">Mot de passe oublié ?</a>
        </div>
        </header>
<?php endif;?>
<?php $header = ob_get_clean()?>