<?php

namespace app\controllers;

use app\models\FilterForm;
use app\models\FilterItem;
use app\models\Formatter;
use kartik\mpdf\Pdf;
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


        $fileName = "../views/site/price.xls";
        $data = Excel::import($fileName); // $config is an optional
        $dataUniqueID = new FilterItem($data);
        $model = new FilterForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->layout = 'catalog';
            //Не забыдь поставить массив вместо строк
            Formatter::spaceRemover($model, ['stringItems', 'stringSizes', 'color']);
            $filterArray = Formatter::toFilterArray($model);
            $filterArrayNoEmpty = Formatter::deleteEmptyItemsArray($filterArray);
            $filterData = $dataUniqueID->filteringData($data, $filterArrayNoEmpty);
            $group = $dataUniqueID->filterArray2($filterData);

            return $this->render('pattern', ['group' => $group]);

        } else {
            $this->layout = 'pattern';
            $uniqueIDs = $dataUniqueID->uniqueValues($data, 'Categories (xyz..)');

            return $this->render('index', ['model' => $model, 'uniqueIDs' => $uniqueIDs]);

        }
    }





    public function actionReport() {


        $fileName = "../views/site/price.xls";
        $data = Excel::import($fileName); // $config is an optional
        $dataUniqueID = new FilterItem($data);
        $model = new FilterForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->layout = 'pdfcatalog';
            //Не забыдь поставить массив вместо строк
            Formatter::spaceRemover($model, ['stringItems', 'stringSizes', 'color']);
            $filterArray = Formatter::toFilterArray($model);
            $filterArrayNoEmpty = Formatter::deleteEmptyItemsArray($filterArray);
            $filterData = $dataUniqueID->filteringData($data, $filterArrayNoEmpty);
            $group = $dataUniqueID->filterArray2($filterData);



            // get your HTML raw content without any layouts or scripts
            $content= $this->render('pdfcatalog', ['group' => $group]);


            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE,
                // A4 paper format
                'format' => Pdf::FORMAT_A4,
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT,
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER,
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:18px}',
                // set mPDF properties on the fly
                'options' => ['title' => 'Krajee Report Title'],
                // call mPDF methods on the fly
                'methods' => [
                    'SetHeader'=>['Krajee Report Header'],
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);

            // return the pdf output as per the destination setting
            return $pdf->render();



        } else {
            $this->layout = 'pattern';
            $uniqueIDs = $dataUniqueID->uniqueValues($data, 'Categories (xyz..)');

            return $this->render('index', ['model' => $model, 'uniqueIDs' => $uniqueIDs]);

        }






    }


    public function actionOne($fullImage, $nameID) {
        $this->layout = 'img';
        return $this->render('img', ['fullImage' => $fullImage, 'nameID' => $nameID]);
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
