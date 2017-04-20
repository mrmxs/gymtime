<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\components\GymsDropdown;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

//\Yii::$app->language = 'ru-RU';
AppAsset::register($this);

$requestGym = Yii::$app->request->get('gym');
if (Yii::$app->request->get('gym') !== null) {
    $requestGym = Yii::$app->request->get('gym');
}
if (Yii::$app->controller->id === 'gym' &&
    Yii::$app->controller->action->id === 'view' &&
    Yii::$app->request->get('id') !== null
) {
    $requestGym = Yii::$app->request->get('id');
}
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

    echo GymsDropdown::widget(['current' => $requestGym]);

    $menuItems = [
        ['label' => Yii::t('site', 'Gym'),
         'url'   => ['/gym/view', 'id' => $requestGym]],
        ['label' => Yii::t('site', 'News'),
         'url'   => ['/news/index', 'gym' => $requestGym]],
        ['label' => Yii::t('site', 'Classes'),
         'url'   => ['/g-class/index', 'gym' => $requestGym]],
        ['label' => Yii::t('site', 'Events'),
         'url'   => ['/events/index', 'gym' => $requestGym]],
        ['label' => Yii::t('site', 'Prices'),
         'url'   => ['/site/prices', 'gym' => $requestGym]],
        ['label' => Yii::t('site', 'Instructors'),
         'url'   => ['/site/instructors', 'gym' => $requestGym]],
        ['label' => Yii::t('site', 'Contact'),
         'url'   => ['/site/contact', 'gym' => $requestGym]],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('site', 'Login'), 'url' => ['/site/login']];
        $menuItems[] = ['label' => Yii::t('site', 'Signup'), 'url' => ['/site/signup']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('site', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
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
        <p class="pull-left">
            &copy; Time2GYM <?= date('Y') ?> |
            <a href="<?= Url::to(['/gym/index']) ?>"><?= Yii::t('site', 'Gyms') ?></a> |
            <a href="<?= Url::to(['/site/about']) ?>"><?= Yii::t('site', 'About') ?></a>
        </p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
