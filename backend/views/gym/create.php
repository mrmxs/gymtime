<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Gym */

$this->title = 'Create Gym';
$this->params['breadcrumbs'][] = ['label' => 'Gyms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gym-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
