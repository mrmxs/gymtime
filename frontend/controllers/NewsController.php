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


    /**
     * Displays all news page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $query = News::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount'      => $query->count(),
        ]);

        $news = $query->orderBy('publication DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'news'  => $news,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'post' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
