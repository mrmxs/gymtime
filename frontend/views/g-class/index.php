<?php

use frontend\components\EventCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $pagination \yii\data\Pagination */
/* @var $classes array */

$this->title = Yii::t('site', 'Classes');
$this->params['breadcrumbs'][] = $this->title;

$scheduleLink = Url::to(['g-class/schedule']);
?>
<div class="event-index">

    <!-- Page Heading -->
    <h1 class="page-header">
        <?= Html::encode($this->title) ?>
        <small>
            <a href="<?= Html::encode($scheduleLink) ?>">
                <?= Yii::t('site', 'Schedule') ?>
            </a>
        </small>
    </h1>

    <? foreach ($classes as $class) {
        echo EventCard::widget([
            'event' => $class,
        ]);
    } ?>

    <!-- Pagination -->
    <div class="row text-center">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
    <!-- /.row -->

</div>
