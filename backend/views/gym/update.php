<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gym */

$this->title = 'Update Gym: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Gyms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gym-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
