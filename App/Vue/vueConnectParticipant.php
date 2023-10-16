<?php ob_start()?>
    <main>

        

  

        <!--EVENT CREATION FORM-->
        <section class="event_creation_form">
            <form action="" method="post">
                <legend>Connectez-vous à votre compte Easeevent</legend>
                <div><?=$error?></div>
                <div>
                    <label for="email_participant">Email * :</label>
                    <input type="text" name="email_participant" id="email_participant" placeholder="Saisir votre email" required  class="inp_placeholder">
                </div>
                <div>
                    <label for="password_participant">Mot de passe * :</label>
                    <input type="text" name="password_participant" id="password_participant" placeholder="Saisir votre mot de passe" required  class="inp_placeholder">
                </div>
                             
                <input type="submit" value="Valider" name="submit" id="submitbut">                
            </form>
        </section>

        
    </main>
    <?php $content = ob_get_clean()?>