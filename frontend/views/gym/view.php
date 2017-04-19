<?php

/* @var $this yii\web\View */
/* @var $gym \common\models\Gym */

use yii\helpers\Html;

$this->title = $gym->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('site', 'Gyms'),/* 'url' => ['gyms']*/];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-gym">
    <h1><?= Html::decode($this->title) ?></h1>

    <code><?= __FILE__ ?></code>

</div>
