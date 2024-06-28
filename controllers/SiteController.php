<?php

namespace app\controllers;

use Yii;
use app\models\Buzz;
use yii\web\Response;
use app\models\Orders;
use app\models\Subset;
use yii\web\Controller;
use app\models\Customers;
use app\models\Downwards;
use app\models\LoginForm;
use app\models\Partition;
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

    public function actionTestBuzz()
    {
        $model = new Buzz();

        $result=[];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $input = $model->input;

            $result=[];

            for ($i = 1; $i <= $input; $i++) {
                if ($i % 3 == 0 && $i % 5 == 0 && $i % 7 == 0) {
                    $result[] = "FizzBuzz";
                } elseif ($i % 3 == 0 && $i % 5 == 0) {
                    $result[] = "Fizz1";
                } elseif ($i % 3 == 0 && $i % 7 == 0) {
                    $result[] = "Fizz2";
                } elseif ($i % 5 == 0 && $i % 7 == 0) {
                    $result[] = "Fizz3";
                } elseif ($i % 3 == 0) {
                    $result[] = "Buzz1";
                } elseif ($i % 5 == 0) {
                    $result[] = "Buzz2";
                } elseif ($i % 7 == 0) {
                    $result[] = "Buzz3";
                } else {
                    $result[] = (string)$i;
                }
            }
        }

        return $this->render('buzz', [
            'model' => $model,
            'result' => $result
        ]);
    }

    public function actionTestSubset()
    {
        $model = new Subset();

        $maxSubsetSize = null;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $strs = explode(',', $model->strs);
            $m = $model->m;
            $n = $model->n;

            $maxSubsetSize = $this->findMaxForm($strs, $m, $n);

        }
        return $this->render('subset', [
            'model' => $model,
            'maxSubsetSize' => $maxSubsetSize
        ]);

    }

    private function findMaxForm($strs, $m, $n)
    {
        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

        foreach ($strs as $str) {
            $zeros = substr_count($str, '0');
            $ones = substr_count($str, '1');
            
            for ($i = $m; $i >= $zeros; $i--) {
                for ($j = $n; $j >= $ones; $j--) {
                    $dp[$i][$j] = max($dp[$i][$j], $dp[$i - $zeros][$j - $ones] + 1);
                }
            }
        }

        return $dp[$m][$n];
    }

    public function actionTestPartition()
    {
        $model = new Partition();
        $result = null;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $nums = array_map('intval', explode(',', $model->nums));
            $k = $model->k;

            $result = $this->splitArray($nums, $k);
        }

        return $this->render('partition', [
            'model' => $model,
            'result' => $result
        ]);
    }

    private function splitArray($nums, $k)
    {
        $left = max($nums);
        $right = array_sum($nums);

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($this->canSplit($nums, $k, $mid)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $left;
    }

    private function canSplit($nums, $k, $maxSum)
    {
        $currentSum = 0;
        $requiredSubarrays = 1;

        foreach ($nums as $num) {
            if ($currentSum + $num > $maxSum) {
                $requiredSubarrays++;
                $currentSum = $num;
                if ($requiredSubarrays > $k) {
                    return false;
                }
            } else {
                $currentSum += $num;
            }
        }

        return true;
    }
    // ------------------------------
}
