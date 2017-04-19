<?php

use common\models\Gym;
use yii\bootstrap\Nav;
use yii\helpers\Html;

/* @var $gyms array|Gym */
/* @var $current Gym */
/* @var $gym Gym */

$menuItems = [[
    'label' => Html::decode($current->name ?? 'not-existing-gym'),
    'items' => [],
]];

foreach ($gyms as $gym) {
    $menuItems[0]['items'][] = [
        'label' => Html::decode($gym->name),
        'url'   => ['/gym/view', 'id' => $gym->id],
    ];
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items'   => $menuItems,
]);