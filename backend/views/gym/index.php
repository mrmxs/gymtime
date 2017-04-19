<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GymSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gyms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gym-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gym', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'about',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
