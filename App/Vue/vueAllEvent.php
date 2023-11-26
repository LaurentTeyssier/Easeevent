<?php ob_start()?>

<hr class="separator_1">
</hr>
<hr class="separator_2">
</hr>
        
<h2>Mes Événements</h2>
    <?php foreach($tab as $event):?>
        <section>
            <dialog class="confirmation_dialog" open>
                <p>Êtes-vous certain de vouloir supprimer cet événement ?</p>
                <div>
                    <button id="confirm_button">Oui</button>
                    <button id="cancel_button">Annuler</button>
                </div>

            </dialog>
        </section>
        <section class="event_page">
            <div class="event_block">
                <div class="event_info">
                <h2 class="event_title"><?=$event->getTitle()?></h2>
                    <i class="fa-solid fa-rectangle-xmark fa-2xl"></i>
                </div>
            </div>
            <div class="event_elements">
                <p>Votre événement est vide...</p>
                <p>Ajoutons des éléments pour le rendre plus sympathique</p>
                <button>Ajouter un élément</button>
            </div>
        </section>
        <section id="empty">
            <h3 id="empty_title">Vous ne participez à aucun événement pour le moment</h3>
            <p>Créons un événement ou rejoignons-en un à l'aide d'un code d'invitation.</p>
            <a href="new_event.html"><button>Créer un événement</button></a>
            <button>Rejoindre un événement</button>
        </section>
    <?php endforeach?>
    <div class="otherEvent">
        <h2>Autres Événements</h2>
    </div>

<hr class="separator_3">
</hr>
<hr class="separator_4">
</hr>


    <p><?=$error?></p>
<?php $content = ob_get_clean()?>