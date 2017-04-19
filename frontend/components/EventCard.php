<?php

namespace frontend\components;

use yii\base\Widget;

class EventCard extends Widget
{
    public $event;

    public function init()
    {
        parent::init();
        if ($this->event === null) {
            $this->event = 'Hello World';
        }
    }
//
//    public function run()
//    {
//        return Html::encode();
//    }

    public function run()
    {
        return $this->render('event_card', [
            'event' => $this->event
        ]);
    }
}