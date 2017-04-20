<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $event \common\models\Event */

$eventLink = $event->type === 'class'
    ? Url::to(['g-class/view', 'gym' => $event->gym_id, 'id' => $event->id])
    : ($event->type === 'event'
        ? Url::to(['events/view', 'gym' => $event->gym_id, 'id' => $event->id])
        : 'unknown type');

$gymLink = Url::to(['gym/view', 'id' => $event->gym_id]);

$imgLink = $event->type === 'class'
    ? 'http://static.time2gym.xyz/event/Gym-700x300.jpg'
    : ($event->type === 'event'
        ? 'http://static.time2gym.xyz/event/¢-PixiTones.com-YOGA-FESTIVAL-2016029-700x300.jpg'
        : 'http://placehold.it/700x300');

$badge = $event->type === 'class' ? 'label-success'
    : ($event->type === 'event' ? 'label-info'
        : 'label-default');
?>

<!-- Project One -->
<div class="row">
    <div class="col-md-7">
        <a href="<?= $eventLink ?>">
            <img class="img-responsive" src="<?= $imgLink ?>" alt="">
        </a>
    </div>
    <div class="col-md-5">
        <p class="lead">
            <a href="<?= $gymLink ?>" style="text-decoration: none;">
                <span class="label label-warning">Gym: <?= $event->gym_id ?></span>
            </a>
        </p>
        <h3><?= Html::encode($event->name) ?>
            <small><span class="label <?= $badge ?>"><?= $event->type ?></span></small>
        </h3>
        <h4><?= Html::encode($event->date) ?></h4>
        <p><?= Html::encode($event->description) ?></p>
        <a class="btn btn-primary" href="<?= $eventLink ?>">
            Читать далее <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
<!-- /.row -->

<hr>