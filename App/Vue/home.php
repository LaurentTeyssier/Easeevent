<?php ob_start()?>
    <main>

        <!--NAVBAR-->
        <section>
            <ul class="navbar">
                <li><a href="">Accueil</a></li>
                <li><a href="./eventadd">Nouvel Événement</a></li>
                <li><a href="./my_events">Mes Événements</a></li>
                <li><a href="./account">Mon Compte</a></li>
            </ul>
        </section>

        <!--TOP SEPARATORS-->
        <hr class="separator_1">
        </hr>
        <hr class="separator_2">
        </hr>

        <!--WELCOME MESSAGE-->
        <section >
            <h2>Bienvenue sur Easeevent !</h2>
            <p>Grâce à cet outil simple et efficace, gérons ensemble votre prochain événement.</p>
            <p>Pour créer un événément, il suffit de fournir quelques éléments contextuels. Une fois ces derniers renseignés, nous pourrons ajouter des sections telles qu'une liste de participants ou de tâches à effectuer.</p>
            <p>En ce qui concerne la forme, nous avons la possibilité de personnaliser les éléments de notre événement en influant sur la couleur ou le texte.</p>

        </section>
        <section class="carrousel">
            <h2>Un peu d'inspiration pour notre événement</h2>
            <div class="slider">
  
                <a href="#slide-1">1</a>
                <a href="#slide-2">2</a>
                <a href="#slide-3">3</a>
                <a href="#slide-4">4</a>
                <a href="#slide-5">5</a>
              
                <div class="slides">
                  <div id="slide-1">
                    <img src="icons/reddit_logo.png" alt="">
                  </div>
                  <div id="slide-2">
                    <img src="icons/facebook_logo.png" alt="">
                  </div>
                  <div id="slide-3">
                    <img src="icons/logo_easeevent.PNG" alt="">
                  </div>
                  <div id="slide-4">
                    4
                  </div>
                  <div id="slide-5">
                    5
                  </div>
                </div>
              </div>
              <a href="./eventadd"><button>C'est parti !</button></a>
        </section>

        <!--BOT SEPARATORS-->
        <hr class="separator_3">
        </hr>
        <hr class="separator_4">
        </hr>

    </main>
    <?php $content = ob_get_clean()?>