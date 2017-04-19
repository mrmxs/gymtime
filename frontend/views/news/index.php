<?php

use yii\helpers\Html;
use frontend\components\NewsCard;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $pagination \yii\data\Pagination */
/* @var $news array */

//\Yii::$app->language = 'ru-RU';
$this->title = Yii::t('site', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-news row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?= Html::encode($this->title) ?>
                <!--<small>Secondary Text</small>-->
            </h1>

            <? foreach ($news as $post) {
                echo NewsCard::widget([
                    'post' => $post,
                ]);
            } ?>

            <!-- Pagination -->
            <div class="row text-center">
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </div>
            <!-- /.row -->

        </div>

        <? include __DIR__ . '\..\layouts\sidebar.php'; ?>

    </div>
    <!-- /.row -->
