<?php

namespace frontend\components;

use common\models\Gym;
use Yii;
use yii\base\Widget;
use yii\web\NotFoundHttpException;

class GymsDropdown extends Widget
{
    public $gyms;
    public $current;
    public $currentId;

    public function init()
    {
        parent::init();

        $query = Gym::find();

        if ($this->gyms === null) {
            $this->gyms = $query->all();
        }
        $this->current = $query
            ->where(['id' => $this->current !== null ? $this->current : 1])
            ->one();
    }

    public function run()
    {
        if ($this->current !== null) {
            return $this->render('gyms_dropdown', [
                'gyms'    => $this->gyms,
                'current' => $this->current,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}