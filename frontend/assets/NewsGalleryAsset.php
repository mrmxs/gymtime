<?php
/**
 * Created by PhpStorm.
 * User: Пушкин
 * Date: 31.03.2017
 * Time: 1:07
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class NewsGalleryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/news-gallery.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\AppAsset',
    ];
}