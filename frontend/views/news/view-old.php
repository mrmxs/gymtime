<?php


use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $post \common\models\News */

$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = Html::encode($this->title);
?>

<div class="site-post ">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <p><a href="<?= $gymLink ?>" style="text-decoration: none;">
                    <span class="label label-warning">Gym: <?= $post->gym_id ?></span></a>
                </p>
                <h2 class="blog-post-title"><?= Html::encode($this->title); ?></h2>
                <p class="blog-post-meta text-muted"><?= Html::encode($post->publication); ?><!-- by <a href="#">Jacob</a>--></p>

                <p><?= Html::encode($post->content); ?></p>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>

<!--<div class="site-post ">-->
<!--    <div class="row">-->
<!--        <div class="col-sm-8 blog-main">-->
<!--            <div class="blog-post">-->
<!--                <p><a href="--><?//= $gymLink ?><!--" style="text-decoration: none;">-->
<!--                    <span class="label label-warning">Gym: --><?//= $post->gym_id ?><!--</span></a>-->
<!--                </p>-->
<!--                <h2 class="blog-post-title">Another blog post</h2>-->
<!--                <p class="blog-post-meta text-muted">December 23, 2013 by <a href="#">Jacob</a></p>-->
<!---->
<!--                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>-->
<!---->
<!--                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>-->
<!--                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>-->
<!--            </div></div>-->
<!--    </div>-->
    <!-- /.row -->
<!--</div>-->