<?php

namespace frontend\controllers;

use Yii;
use common\models\Event;
use common\models\EventSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GClassController implements the CRUD actions for Event model.
 */
class EventsController extends Controller
{
    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Event::find()->where(['type' => 'event',]);

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
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'event' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne(['type' => 'event', 'id' => $id,])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
