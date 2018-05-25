<?php

namespace app\controllers;

use Yii;
use app\models\RestoSchedule;
use app\models\search\RestoScheduleSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RestoScheduleController implements the CRUD actions for RestoSchedule model.
 */
class RestoScheduleController extends Controller
{
    public function actionH(){
        $string = "Mon-Wed, Sun, Wed, Sat 5 pm - 12:30 am / Thu-Fri, Sun 5 pm - 1:30 am / Sat-Sun, Wed 3 pm - 1:30 am / Sun 3 pm - 11:30 pm";
        // pecah schedule kata panjang
        $pecahSched = explode(' / ',$string);

        foreach ($pecahSched as $p){
            // jika ada koma, pecah
            if(strpos($p,',')){
                $pecahKoma = explode(', ',$p);
                $head = $pecahKoma[0];
                $tail = array_slice($pecahKoma,1);
                
                    echo $head;
                    echo '<br />';
                    foreach ($tail as $t){
                        // jika ada am
                        if(strpos($t, 'am') || strpos($t,'pm')){
                            $pecahAm = explode(' ',$t);
                            $pahead = $pecahAm[0];
                            $patail = array_slice($pecahAm,1);
                            $patail =  implode(' ',$patail);

                            echo $pahead;
                            echo '<br />';
                            echo $patail;
                            echo '<br />';
                        }
                        else{
                            echo $t;
                            echo '<br />';
                        }
                    }
                    echo "TAIL " . Json::encode($tail);

                    echo '<br />';
                    echo '------------';
                echo '<br />';


            }
//            jika tidak ada koma
            else{
                echo "ALL " . Json::encode($p);
                echo '<br />';
            }
        }
        echo '<br />';
        echo $string;

    }

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
     * Lists all RestoSchedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RestoScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RestoSchedule model.
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
     * Creates a new RestoSchedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RestoSchedule();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->resto_schedule]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RestoSchedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->resto_schedule]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RestoSchedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RestoSchedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RestoSchedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RestoSchedule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
