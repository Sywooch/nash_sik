<?php

namespace app\controllers;

use app\models\About\About;
use app\models\Blog;
use app\models\Header;
use app\models\Products\Products;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\NotFoundHttpException;
use app\models\UploadForm;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
        $this->layout = 'main';
        $header = Header::find()->one();
        $about = About::find()->one();
        $product1 = Products::find()->where(['category' => '1.93л'])->one();
        $product2 = Products::find()->where(['category' => '0.95л'])->one();
        $product3 = Products::find()->where(['category' => '0.2л'])->one();
        return $this->render('index',[
            'header' => $header,
            'about' => $about,
            'product1' => $product1,
            'product2' => $product2,
            'product3' => $product3
        ]);
    }
    public function actionBlogs()
    {
        $this->layout = 'main_blog';
        $query = Blog::find()->orderBy('id DESC');
        $queryForFilter = clone $query;

        if($filter = yii::$app->request->get('filter')) {
            $query->filtered($filter);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 3]);
        $blogs = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $pages->pageSizeParam = false;

        return $this->render('blogs',[
            'blogs' => $blogs,
            'queryForFilter' => $queryForFilter,
            'pages' => $pages,
        ]);
    }
    public function actionBlog($id)
    {
        $this->layout = 'main_blog';
        $blogs = Blog::find()->orderBy('id DESC')->limit(5)->all();
        return $this->render('blog', [
            'model' => $this->findModel($id),
            'blogs' => $blogs
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
