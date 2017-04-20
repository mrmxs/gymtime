<?php

namespace frontend\controllers;

use Yii;
use common\models\Event;
use common\models\EventSearch;
use yii\data\Pagination;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GClassController implements the CRUD actions for Event model.
 */
class EventsController extends Controller
{
    public $layout = 'gym';

    /**
     * Lists all Event models.
     * @param integer $gym
     * @return mixed
     */
    public function actionIndex($gym = null)
    {
        $query = Event::find()->filterWhere([
            'type' => 'event',
            'gym_id' => $gym,
        ]);

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount'      => $query->count(),
        ]);

        $events = $query->orderBy('date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'events'  => $events,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @param integer $gym
     * @return mixed
     */
    public function actionView($id, $gym = null)
    {
        return $this->render('view', [
            'event' => $this->findModel($id, $gym),
        ]);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $gymId
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $gymId = null)
    {
        $model = ($gymId === null)
            ? Event::findOne(['type' => 'event', 'id' => $id,])
            : Event::findOne(['type' => 'event', 'id' => $id, 'gym_id' => $gymId,]);

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
