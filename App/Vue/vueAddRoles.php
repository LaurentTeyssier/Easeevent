<?php ob_start()?>
    <form action="" method="post">
        <label for="name_role">Saisir le nom du rôle</label>    
        <input type="text" name="name_role">
        <input type="submit" value="Ajouter" name="submit">
        <div><?=$error?></div>
    </form>
<?php $content = ob_get_clean()?>