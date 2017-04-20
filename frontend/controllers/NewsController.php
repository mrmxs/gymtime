<?php

namespace frontend\controllers;

use common\models\News;
use common\models\NewsSearch;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    public $layout = 'gym';

    /**
     * Displays all news page.
     * @param integer $gym
     * @return mixed
     */
    public function actionIndex($gym = null)
    {
        //TODO если не существует зал - 404

        $query = News::find();
        if ($gym !== null) {
            $query = $query->where(['gym_id' => $gym]);
        }

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount'      => $query->count(),
        ]);

        $news = $query->orderBy('publication DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', ['news'       => $news,
                                       'pagination' => $pagination,]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @param integer $gym
     * @return mixed
     */
    public
    function actionView($id, $gym = null)
    {
        return $this->render('view', [
            'post' => $this->findModel($id, $gym),
        ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $gymId
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id, $gymId = null)
    {
        $model = ($gymId === null)
            ? News::findOne($id)
            : News::findOne(['id' => $id, 'gym_id' => $gymId,]);

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
