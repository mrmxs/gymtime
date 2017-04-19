<?php

use frontend\components\EventCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $pagination \yii\data\Pagination */
/* @var $events array */

$this->title = Yii::t('site', 'Events');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    <?
        $color_primary = '#8c33b7';
        $color_light = '#f8e9ff';
        $color_dark = '#692890';
     ?>
    .navbar-inverse .navbar-nav > .active > a,
    .navbar-inverse .navbar-nav > .active > a:hover,
    .navbar-inverse .navbar-nav > .active > a:focus {
        background-color: <?=$color_primary?>;
    }

    .breadcrumb {
        background-color: <?=$color_light?>;
    }

    .btn-primary {
        background-color: <?=$color_primary?>;
        border-color: <?=$color_dark?>;
    }

    .btn-primary:hover,

    .btn-primary:active,
    .btn-primary.active,
    .open > .dropdown-toggle.btn-primary,

    .btn-primary:focus,
    .btn-primary.focus,

    .btn-primary:active:hover,
    .btn-primary.active:hover,
    .open > .dropdown-toggle.btn-primary:hover,
    .btn-primary:active:focus,
    .btn-primary.active:focus,
    .open > .dropdown-toggle.btn-primary:focus,
    .btn-primary:active.focus,
    .btn-primary.active.focus,
    .open > .dropdown-toggle.btn-primary.focus {
        background-color: <?=$color_dark?>;
        border-color: <?=$color_dark?>;
      }

    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        background-color: <?=$color_primary?>;
        border-color: <?=$color_primary?>;
    }
</style>

<div class="event-index">

    <!-- Page Heading -->
    <h1 class="page-header">
        <?= Html::encode($this->title) ?>
    </h1>

    <? foreach ($events as $event) {
        echo EventCard::widget([
            'event' => $event,
        ]);
    } ?>

    <!-- Pagination -->
    <div class="row text-center">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
    <!-- /.row -->
</div>
