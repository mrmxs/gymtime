<?php

namespace frontend\components;

use yii\base\Widget;

class NewsCard extends Widget
{
    public $post;

    public function init()
    {
        parent::init();
        if ($this->post === null) {
            $this->post = 'Hello World';
        }
    }
//
//    public function run()
//    {
//        return Html::encode();
//    }

    public function run()
    {
        return $this->render('news_card', [
            'post' => $this->post
        ]);
    }
}