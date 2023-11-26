<?php ob_start() ?>
<main>

    <!--TOP SEPARATORS-->
    <hr class="separator_1">
    </hr>
    <hr class="separator_2">
    </hr>

    <!--EVENT CREATION FORM-->
    <section class="event_creation_form">
        <form action="" method="post">
            <legend>Commençons par donner du contexte à notre événement</legend>
            <div><?= $error ?></div>
            <div>
                <label for="title_event">Titre * :</label>
                <input type="text" name="title_event" id="title_event" placeholder="Choisissez un titre" required class="inp_placeholder">
            </div>
            <div>
                <label for="description_event">Description * :</label>
                <input type="text" name="description_event" id="description_event" placeholder="Rédigez une description" required class="inp_placeholder">
            </div>
            <div>
                <label for="place_event">Lieu * :</label>
                <input type="text" name="place_event" id="place_event" placeholder="Choisissez un lieu" required class="inp_placeholder">
            </div>
            <div>
                <label for="begin_date_event">Date de début * :</label>
                <input type="datetime-local" name="begin_date_event" id="begin_date_event" required>
            </div>
            <div>
                <label for="end_date_event">Date de fin * :</label>
                <input type="datetime-local" name="end_date_event" id="end_date_event" required>
            </div>
            <input type="submit" value="Valider" name="submit" id="submitbut">
        </form>
    </section>

    <!--BOT SEPARATORS-->
    <hr class="separator_3">
    </hr>
    <hr class="separator_4">
    </hr>

</main>
<?php $content = ob_get_clean() ?>