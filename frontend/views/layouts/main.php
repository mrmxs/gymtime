<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\components\GymsDropdown;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

//\Yii::$app->language = 'ru-RU';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Time2GYM',
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo GymsDropdown::widget();
//
//    $leftMenuItems = [
//        ['label' => Yii::t('site', 'Gyms'), 'items' => [
//            ['label' => Yii::t('site', 'Gym1'), 'url' => ['/gym/view', 'id' => '1']],
//            ['label' => Yii::t('site', 'Gym2'), 'url' => ['/gym/view', 'id' => '2']],
//            ['label' => Yii::t('site', 'Gym3'), 'url' => ['/gym/view', 'id' => '3']],
//            ['label' => Yii::t('site', 'Gym4'), 'url' => ['/gym/view', 'id' => '4']],
//        ]],
//    ];
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-left'],
//        'items'   => $leftMenuItems,
//    ]);

    $menuItems = [
        //['label' => 'Home', 'url' => ['/site/index']],
        ['label' => Yii::t('site', 'News'), 'url' => ['/news/index']],
        ['label' => Yii::t('site', 'Classes'), 'url' => ['/g-class/index']],// ['/site/classes']],
        ['label' => Yii::t('site', 'Events'), 'url' => ['/events/index']],// ['/site/classes']],
        ['label' => Yii::t('site', 'Prices'), 'url' => ['/site/prices']],
        ['label' => Yii::t('site', 'Team'), 'url' => ['/site/team']],
        ['label' => Yii::t('site', 'Contact'), 'url' => ['/site/contact']],
//        ['label' => Yii::t('site', 'About'), 'url' => ['/site/about']],
    ];
    //    if (Yii::$app->user->isGuest) {
    //        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    //    } else {
    //        $menuItems[] = '<li>'
    //            . Html::beginForm(['/site/logout'], 'post')
    //            . Html::submitButton(
    //                'Logout (' . Yii::$app->user->identity->username . ')',
    //                ['class' => 'btn btn-link logout']
    //            )
    //            . Html::endForm()
    //            . '</li>';
    //    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'   => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Time2GYM <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
