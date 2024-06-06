<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Orders;
use yii\web\Controller;
use app\models\Customers;
use app\models\Downwards;
use app\models\LoginForm;
use app\models\JumpRabbit;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
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
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
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
    public function actionAbout()
    {
        return $this->render('about');
    }

    // ANSWER TEST

    public function actionTestOne()
    {
        $array = [1, 2, 3, 4, 5];
        $count = 3;

        // Potong array dan tukar array nya
        $length = count($array); //panjang array
        $rotate = $count % $length; //handle jika melebihi panjang array

        $slice1 = array_slice($array, -$rotate);
        $slice2 = array_slice($array, 0, $length - $rotate);

        $result = array_merge($slice1,$slice2);

        return $this->render('test-one', [
            'results' => "Result => " . implode(', ', $result)
        ]);
    }

    // PENAMAAM FUNCTION CONTROLLER HARUS == NAMA PAGE DI FOLDER SITE
    public function actionTestTwo()
    {
        $model = new Downwards();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $results = $this->getOutput($model->number);
                return $this->render('result-test-two',[
                    'results' => $results,
                    'number' => $model->number
                ]);
            }
        }

        return $this->render('test-two',[
            'model' => $model
        ]);
    }

    private function getOutput($number)
    {
        $results = [];
        for ($i = 1; $i <= $number; $i++) {
            if ($i % 2 == 0 && $i % 3 == 0) {
                $results[] = 'TwoThree';
            } elseif ($i % 2 == 0) {
                $results[] = 'Two';
            } elseif ($i % 3 == 0) {
                $results[] = 'Three';
            } else {
                $results[] = $i;
            }
        }
        return $results;
    }

    public function actionTestThree()
    {
        $model = new JumpRabbit();

        $result = null;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $position1 = $model->position1;
            $velocity1 = $model->velocity1;
            $position2 = $model->position2;
            $velocity2 = $model->velocity2;

            //RUMUS MENCARI TITIK PERTEMUAN
            $t = ($position2 - $position1) / ($velocity1 - $velocity2);
            if ($t >= 0 && floor($t) == $t) {
                $result = "YES";
            } else {
                $result = "NO";
            }
        }

        return $this->render('test-three',[
            'model' => $model,
            'result' => $result
        ]);
    }

    public function actionTestFour()
    {
        $model = new Orders();

        $query = $model->orderLists();

        return $this->render('test-four',[
            'queries' => $query
        ]);
    }

    public function actionTestFive()
    {
        $model = new Customers();
        
        $query = $model->detailCustomers();

        return $this->render('test-five',[
            'queries' => $query
        ]);
    }

    // ------------------------------
}
