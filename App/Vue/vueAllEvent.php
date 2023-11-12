<?php ob_start()?>
<h2>Mes Événements</h2>
    <?php foreach($tab as $event):?>
        <div class="event_info">
            <p>Titre <?=$event->getTitle()?></p>
            <p><?=$event->getPlace()?></p>
            <p><?=$event->getBeginDate()?></p>
            <p><?=$event->getEndDate()?></p>
            <p><?=$event->getDescription()?></p>
        </div>
    <?php endforeach?>
    <div class="otherEvent">
        <h2>Autres Événements</h2>
    </div>
    <p><?=$error?></p>
<?php $content = ob_get_clean()?>