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
class GClassController extends Controller
{
    public $layout = 'gym';

    /**
     * Lists all Event models.
     * @param integer $gym
     * @return mixed
     */
    public function actionIndex($gym = null)
    {
//        $searchModel = new EventSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
        $query = Event::find()->where(['type' => 'class',]);
        if ($gym !== null) {
            $query = $query->where(['gym_id' => $gym]);
        }

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount'      => $query->count(),
        ]);

        $classes = $query->orderBy('date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'classes'    => $classes,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionSchedule($gym = null)
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('schedule', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
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
            'class' => $this->findModel($id, $gym),
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
            ? Event::findOne(['type' => 'class', 'id' => $id,])
            : Event::findOne(['type' => 'class', 'id' => $id, 'gym_id' => $gymId,]);

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
