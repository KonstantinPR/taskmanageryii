<?php

namespace app\controllers;

use app\models\FilterForm;
use app\models\FilterItem;
use app\models\Formatter;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use moonland\phpexcel\Excel;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * @inheritdoc
     */
    public function actions() {
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
    public function actionIndex() {


        $this->layout = 'pattern';
        $fileName = "../views/site/price.xls";
        $data = Excel::import($fileName); // $config is an optional
        $dataUniqueID = new FilterItem($data);
        $model = new FilterForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Не забыдь поставить массив вместо строк
            Formatter::spaceRemover($model, ['stringItems', 'stringSizes', 'color']);
            $filterArray = Formatter::toFilterArray($model);
            $filterArrayNoEmpty = Formatter::deleteEmptyItemsArray($filterArray);
            $filterData = $dataUniqueID->filteringData($data, $filterArrayNoEmpty);
            $group = $dataUniqueID->groupCharacters($filterData, 'ID');
//            var_dump($filterData);
//            die;

            return $this->render('pattern', ['group' => $group, 'data' => $data]);

        } else {
            $uniqueIDs = $dataUniqueID->uniqueValues($data, 'Categories (xyz..)');

            return $this->render('index', ['model' => $model, 'uniqueIDs' => $uniqueIDs]);

        }
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionPattern() {
        return $this->render('pattern');
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
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
    public function actionAbout() {
        return $this->render('about');
    }
}
