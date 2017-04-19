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

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new EventSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
        $query = Event::find()->where(['type' => 'class',]);

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
    public function actionSchedule()
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
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'class' => $this->findModel($id),
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
        if (($model = Event::findOne(['type' => 'class', 'id' => $id,])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
