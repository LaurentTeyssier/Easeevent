<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ffac78d15d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Public/asset/style/SCSS/style.css">
    <title>Nouvel événement Easeevent</title>
</head>

<!--BODY-->

<body>

    <!--HEADER-->
    <?php
    include 'header.php';
    ?>
    <main>

        <!--NAVBAR-->
        <section>
            <ul class="navbar">
                <li><a href="./">Accueil</a></li>
                <li><a href="">Nouvel Événement</a></li>
                <li><a href="./my_events">Mes Événements</a></li>
                <li><a href="./account">Mon Compte</a></li>
            </ul>
        </section>

        <!--TOP SEPARATORS-->
        <hr class="separator_1">
        </hr>
        <hr class="separator_2">
        </hr>

        <!--EVENT CREATION FORM-->
        <section class="event_creation_form">
            <form action="" method="post">
                <legend>Commençons par donner du contexte à notre événement</legend>
                <div>
                    <label for="title">Titre * :</label>
                    <input type="text" name="title" id="title" placeholder="Choisissez un titre" required  class="inp_placeholder">
                </div>
                <div>
                    <label for="desc">Description * :</label>
                    <input type="text" name="desc" id="desc" placeholder="Rédigez une description" required  class="inp_placeholder">
                </div>
                <div>
                    <label for="place">Lieu * :</label>
                    <input type="text" name="place" id="place" placeholder="Choisissez un lieu" required  class="inp_placeholder">
                </div>
                <div>
                    <label for="start_date">Date de début * :</label>
                    <input type="datetime-local" name="start_date" id="start_date" required>
                </div>
                <div>
                    <label for="end_date">Date de fin * :</label>    
                    <input type="datetime-local" name="end_date" id="end_date" required>
                </div>
                
                <input type="submit" value="Valider" name="submit">
            </form>

        </section>

        <!--BOT SEPARATORS-->
        <hr class="separator_3">
        </hr>
        <hr class="separator_4">
        </hr>

    </main>
    <?php
    include 'footer.php';
    ?>
    <script src="script.js"></script>
</body>

</html>