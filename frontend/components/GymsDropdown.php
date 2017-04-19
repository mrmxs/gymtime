<?php

namespace frontend\components;

use common\models\Gym;
use yii\base\Widget;

class GymsDropdown extends Widget
{
    public $gyms;
    public $current;

    public function init()
    {
        parent::init();

        $query = Gym::find();

        if ($this->gyms === null) {
            $this->gyms = $query->all();
        }
        if ($this->current === null) {
            $this->current = 1;
        }

        $this->current =$query->where(['id' => $this->current])->one();
    }
//
//    public function run()
//    {
//        return Html::encode();
//    }

    public function run()
    {
        return $this->render('gyms_dropdown', [
            'gyms'    => $this->gyms,
            'current' => $this->current,
        ]);
    }
}