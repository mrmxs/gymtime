<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $post \common\models\News */

$eventLink = Url::to(['news/view', 'id' => $post->id]);//"/index.php?r=news%2Fview&id={}";
$gymLink = "";
$imgLink = "http://static.time2gym.xyz/post/surf41.jpg"; //"http://placehold.it/900x300";
$postedDate = "Опубликовано: {$post->publication}";// "Posted on August 28, 2013 at 10:00 PM";
?>

<!-- Blog Post -->
<div>
    <p class="lead text-left">
        <a href="<?= $gymLink ?>" style="text-decoration: none;">
            <span class="label label-warning">Gym: <?= $post->gym_id ?></span>
        </a>
    </p>
    <h2>
        <?= Html::encode($post->title) ?>
<!--        <a href="--><?//= $eventLink ?><!--">--><?//= Html::encode($post->title) ?><!--</a>-->
    </h2>
    <p><span class="glyphicon glyphicon-time"></span> <?= Html::encode($postedDate); ?></p>
    <!--    <img class="img-responsive" src="--><? //= $imgLink ?><!--" alt="">
    <br/>-->
    <p><?= Html::encode($post->content) ?></p>
    <a class="btn btn-primary" href="<?= $eventLink ?>">Читать далее
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>

    <hr>
</div>