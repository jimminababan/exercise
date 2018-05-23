<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function actionFactorial()
    {
        return $this->render('factorial');
    }


    public function actionSortarray()
    {
        if (Yii::$app->request->isPost) {
            $arr = explode(',', $_POST['number']);
            if (is_array($arr)) {
                if ((count(array_unique($arr)) < count($arr)) == false) {
                    $unique = 'YES';
                    $size = count($arr) - 1;
                    for ($i = 0; $i < $size; $i++) {
                        for ($j = 0; $j < $size - $i; $j++) {
                            $k = $j + 1;
                            if ($arr[$k] < $arr[$j]) {
                                // Swap elements at indices: $j, $k
                                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                            }
                        }
                    }
                } else {
                    $unique = 'NO';
                }
            }
            return $this->render('sortarray', ['arr' => $arr,'unique'=>$unique]);
        }
        return $this->render('sortarray');
    }


    public function actionArrayrotation()
    {
        $m = [];
        $m[0] = [4,4,1,4];
        $m[1] = [1,2,3,4];
        $m[2] = [5,6,7,8];
        $m[3] = [9,10,11,12];
        $newMatrix = [];

        function rotateMatrix($m, $i = 0, &$newMatrix)
        {
            foreach ($m as $chunk) {
                $newChunk[] = $chunk[$i];
            }
            $newMatrix[] = array_reverse($newChunk);
            $i++;

            if ($i < count($m)) {
                rotateMatrix($m, $i, $newMatrix);
            }
        }

        rotateMatrix($m, 0, $newMatrix);
        return $this->render('array-rotation',['newMatrix'=>$newMatrix,'m'=>$m]);
    }


    /**
     * {@inheritdoc}
     */
    public
    function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public
    function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public
    function actionIndex()
    {
        $this->enableCsrfValidation = false;
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public
    function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public
    function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public
    function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public
    function actionAbout()
    {
        return $this->render('about');
    }
}
