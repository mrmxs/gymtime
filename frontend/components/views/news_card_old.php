<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $post \common\models\News */

$link = Url::to(['news/view', 'id' => $post->id]);//"/index.php?r=news%2Fview&id={}";
$gymLink = "";
$imgLink = "http://www.birthtraumacounselling.org/wp-content/uploads/2016/12/3-300x100.jpg"; //"http://placehold.it/300x100";
?>

<div class="col-lg-4">

    <div class="thumbnail " style="border: none;">
        <p><a href="<?= $gymLink ?>" style="text-decoration: none;">
            <span class="label label-warning">Gym: <?= $post->gym_id ?></span></a>
        </p>

        <a href="<?= $link ?>" style="text-decoration: none; color: #000;">
            <img style="width: 100%;" src="<?= $imgLink ?>" alt="...">

            <h2><?= Html::encode($post->title) ?></h2>

            <p style="word-wrap: break-word;"><?= Html::encode($post->content) ?></p>

        </a>
        <a href="<?= $link ?>"> »»»» </a>
        <!--<p><a class="btn btn-default btn-xs" href="">»»»»</a></p>-->
    </div>

</div>