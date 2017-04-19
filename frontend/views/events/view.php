<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $event common\models\Event */

$this->title = $event->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('site', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$eventLink = Url::to(['g-class/view', 'id' => $event->id]);//"/index.php?r=news%2Fview&id={}";
$gymLink = "";
$imgLink = "http://static.time2gym.xyz/event/33149565.jpg"; //"http://placehold.it/750x500";
$badge = $event->type === 'class' ? 'label-success'
    : ($event->type === 'event' ? 'label-info'
        : 'label-default');
?>
<div class="event-view">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <p class="lead">
                <a href="<?= $gymLink ?>" style="text-decoration: none;">
                    <span class="label label-warning">Gym: <?= $event->gym_id ?></span>
                </a>
            </p>
            <h1 class="page-header"><?= Html::encode($this->title) ?>
                <small><span class="label <?= $badge ?>"><?= Html::encode($event->type) ?></span></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-responsive" src="<?= $imgLink ?>" alt="">
        </div>

        <div class="col-md-4">
            <h3>Описание</h3>
            <p><?= Html::encode($event->description) ?></p>
            <h3>Дата проведения:</h3>
            <p><?= Html::encode($event->date) ?></p>
            <?php
            if(!$event->isactive) {
                echo '<p><span class="label label-default">Событие закончилось</span></p>';
            }
            ?>
        </div>

    </div>
    <!-- /.row -->
</div>


