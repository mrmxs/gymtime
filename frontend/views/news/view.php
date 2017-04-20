<?php


use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $post \common\models\News */

$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('site', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Html::encode($this->title);

$postLink = Url::to(['news/view', 'id' => $post->id]);//"/index.php?r=news%2Fview&id={}";
$gymLink = Url::to(['gym/view', 'id' => $post->gym_id]);;
$imgLink = "http://static.time2gym.xyz/post/surf41.jpg"; //"http://placehold.it/900x300";
$postedDate = "Опубликовано: {$post->publication}";// "Posted on August 28, 2013 at 10:00 PM";
?>

<div class="site-post row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Author -->
        <p class="lead">
            <a href="<?= $gymLink ?>" style="text-decoration: none;">
                <span class="label label-warning">Gym: <?= $post->gym_id ?></span>
            </a>
        </p>

        <!-- Title -->
        <h1><?= Html::encode($this->title); ?></h1>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> <?= Html::encode($postedDate); ?></p>

        <!-- Preview Image -->
        <img class="img-responsive" src="<?= $imgLink ?>" alt="">

        <br>

        <!-- Post Content -->
        <p class="lead"><?= Html::encode($post->content); ?></p>
        <p><?= Html::encode($post->content); ?></p>


    </div>

    <? include __DIR__ . '\..\layouts\sidebar.php'; ?>

</div>
<!-- /.row -->