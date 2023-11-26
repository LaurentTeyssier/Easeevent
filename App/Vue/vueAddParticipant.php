<?php ob_start() ?>

<hr class="separator_1">
</hr>
<hr class="separator_2">
</hr>
<div class="form_page">
    <section class="event_creation_form">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="firstname_participant">Prénom :</label>
                <input type="text" name="firstname_participant" placeholder="Saisir le prénom">
            </div>
            <div>
                <label for="name_participant">Nom :</label>
                <input type="text" name="name_participant" placeholder="Saisir le nom">
            </div>
            <div>
                <label for="email_participant">Mail :</label>
                <input type="email" name="email_participant" placeholder="Saisir le mail">
            </div>
            <div>
                <label for="phone_participant">Téléphone :</label>
                <input type="text" name="phone_participant" placeholder="Saisir le numéro de téléphone">
            </div>
            <div>
                <label for="password_participant">Password :</label>
                <input type="password" name="password_participant" placeholder="Saisir le mot de passe">
            </div>
            <div>
                <label for="repeat_password_participant">Confirmer password :</label>
                <input type="password" name="repeat_password_participant" placeholder="Confirmer le mot de passe">
            </div>
            <div>
                <label for="picture_participant">Choisir un avatar :</label>
                <input type="file" name="picture_participant">
            </div>
            <input type="submit" value="S'inscrire" name="submit">
            <div><?= $error ?></div>

        </form>
    </section>
</div>

<hr class="separator_3">
</hr>
<hr class="separator_4">
</hr>

<?php $content = ob_get_clean() ?>