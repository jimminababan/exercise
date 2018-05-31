<?php

namespace app\modules\restaurantopeninghours\controllers\backend;

use Yii;
use app\models\RestaurantOpeningHours;
use app\modules\restaurantopeninghours\models\backend\RestaurantOpeningHoursSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RestaurantOpeningHoursController implements the CRUD actions for RestaurantOpeningHours model.
 */
class RestaurantOpeningHoursController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RestaurantOpeningHours models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RestaurantOpeningHoursSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RestaurantOpeningHours model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RestaurantOpeningHours model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RestaurantOpeningHours();
        $model->restaurant_id = Yii::$app->request->get('restaurant_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if (\Yii::$app->request->get('restaurant_id')) {
                return $this->redirect(['/restaurants/backend/restaurants/view', 'id' => $model->restaurant->id]);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RestaurantOpeningHours model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if (\Yii::$app->request->get('restaurant_id')) {
                return $this->redirect(['/restaurants/backend/restaurants/view', 'id' => $model->restaurant->id]);
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RestaurantOpeningHours model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        if (\Yii::$app->request->get('restaurant_id')) {
            return $this->redirect(['/restaurants/backend/restaurants/view', 'id' => $model->restaurant->id]);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the RestaurantOpeningHours model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RestaurantOpeningHours the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RestaurantOpeningHours::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
