<?php

namespace app\controllers;

use app\models\CreateForm;
use app\models\OrderForm;
use app\models\Record;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\Item;
use app\models\Buy;
use app\models\User;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
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
        return $this->render('index', ['items'=>Item::getAll()]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function  actionItems()
    {
        $query = Item::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('items', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
    public function  actionItem($id)
    {
        $item = Item::findOne($id);
        return $this->render('item',['item'=>$item]);
    }
    public function  actionBuy($id)
    {
        $buy = Buy::findOne($id);

        $model = new OrderForm();
        $model->s_id =$id;
        if ($model->load(Yii::$app->request->post()) && $model->order()) {
            return $this->goBack();
        }
        if(Yii::$app->request->getIsPost())
        {
            return Yii::$app->response->redirect(array('site/mybuys'));
        }
        return $this->render('buy',['model'=>$model, 'buy'=>$buy]);
    }
    public function  actionRemoveOrder($id)
    {
        Record::deleteAll(['s_id'=>$id, 'u_id'=>Yii::$app->user->identity->getId()]);
        return $this->redirect(Yii::$app->request->referrer);
    }
    public function  actionBuys()
    {
        $buy = new Buy();
        $buys = $buy->getAllBuys();
        return $this->render('buys',['buys'=>$buys]);
    }
    public function  actionMy()
    {
        $buy = new Buy();
        $buys = $buy->getBuysByID(Yii::$app->user->identity->getId());
        return $this->render('buys',['buys'=>$buys]);
    }
    public function  actionMybuys()
    {
        $buy = new Buy();
        $buys = $buy->getMyBuys(Yii::$app->user->identity->getId());
        return $this->render('Mybuys',['buys'=>$buys]);
    }
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

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if (!User::isAdmin(Yii::$app->user->identity->getId())) {
            return $this->goHome();
        }

        $model = new CreateForm();
        if ($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->goBack();
        }
        if(Yii::$app->request->getIsPost())
        {
            return Yii::$app->response->redirect(array('site/buys'));
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
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
}
