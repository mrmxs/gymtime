<?php

use yii\helpers\Html;
use frontend\components\NewsCard;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    /* Bootstrap Flexbox Utility
     * https://v4-alpha.getbootstrap.com/utilities/flexbox/
     */

    .align-content-stretch {
        -webkit-align-content: stretch!important;
        -ms-flex-line-pack: stretch!important;
        align-content: stretch!important;
    }
    .flex-wrap {
        -webkit-flex-wrap: wrap!important;
        -ms-flex-wrap: wrap!important;
        flex-wrap: wrap!important;
    }
    .d-flex {
        display: -webkit-box!important;
        display: -webkit-flex!important;
        display: -ms-flexbox!important;
        display: flex!important;
    }
</style>
<div class="site-news">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--    --><? //= ListView::widget([
    //        'dataProvider' => $dataProvider,
    //        'itemOptions' => ['class' => 'item'],
    //        'itemView' => function ($model, $key, $index, $widget) {
    //            return //Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
    //                NewsCard::widget(['post' => $model->title]);
    //        },
    //    ]) ?>


    <div class="body-content">

        <div class="row d-flex flex-wrap align-content-stretch">

            <? foreach ($dataProvider->models as $model) {
                echo NewsCard::widget([
                    'post' => $model,
                ]);
            } ?>

        </div>

    </div>

</div>
