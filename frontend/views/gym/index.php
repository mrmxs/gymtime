<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use common\models\Gym;

$this->title = Yii::t('site', 'Gyms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-gyms">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <code>--><?//= __FILE__ ?><!--</code>-->

    <?php /*echo GridView::widget([
        'dataProvider' => $dataProvider
    ]);*/
    /* @var $gym Gym */
    foreach ($dataProvider as $gym) {
        echo "{$gym->id} {$gym->name}<br>\n";
    }



    ?>

</div>
