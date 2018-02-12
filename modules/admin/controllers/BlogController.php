<?php

namespace app\modules\admin\controllers;

use app\models\ImageManager;
use app\models\UploadForm;
use Yii;
use app\models\Blog;
use app\models\BlogSearch;
use yii\helpers\FileHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;


Yii::setAlias('@images', dirname(dirname(dirname(__DIR__))) . '/web/img/');

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delete-image' => ['POST'],
                    'sort-image' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
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
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blog model.
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
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->uploadHeader()) {
                // file is uploaded successfully
                return $this->redirect(['index']);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    public function actionSaveImg()
    {
        $this->enableCsrfValidation = false;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $dir_name = strtolower($post['ImageManager']['class']);
            $dir = Yii::getAlias('@images'). '/'. $dir_name. '/';
            if (!file_exists($dir)){
                FileHelper::createDirectory($dir);
            }
            $result_link = Yii::getAlias('@images').'/'.$dir_name.'/';
            $file = UploadedFile::getInstanceByName('ImageManager[attachment]');
            $model = new ImageManager();
            $model->name = strtolower(strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' .
                $file->extension);
            $model->load($post);
            $model->validate();

            if ($model->hasErrors()){
                $result = [
                    'error' => $model->getFirstError('file')
                ];
            }else {

                if ($file->saveAs($dir . $model->name)) {
                    $imag = Yii::$app->image->load($dir . $model->name);
                    $imag->resize(800, NULL, Yii\image\drivers\Image::PRECISE)
                        ->save($dir . $model->name, 85);

                    $result = ['filelink' => $result_link . $model->name, 'filename' => $model->name];
                } else {
                    $result = [
                        'error' => 'Ошибка'
                    ];
                }
                $model->save();
            }
            Yii::$app->response->format = Response::FORMAT_JSON;

            return $result;
        } else {
            throw new BadRequestHttpException('Only POST is allowed');
        }
    }

    public function actionDeleteImage()
    {
        if(($model = ImageManager::findOne(Yii::$app->request->post('key')))){
            $dir_name = strtolower($model->class);
            unlink(Yii::getAlias('@images').'/'.$dir_name. '/'. $model->name);
            $model->delete();
            return true;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }
    public function actionSortImage($id)
    {
        if(Yii::$app->request->isAjax){
            $post = Yii::$app->request->post('sort');
            if($post['oldIndex'] > $post['newIndex']){
                $param = ['and',['>=','sort',$post['newIndex']],['<','sort',$post['oldIndex']]];
                $counter = 1;
            }else{
                $param = ['and',['<=','sort',$post['newIndex']],['>','sort',$post['oldIndex']]];
                $counter = -1;
            }
            ImageManager::updateAllCounters(['sort' => $counter], [
                'and',['class'=>'blog','item_id'=>$id],$param
            ]);
            ImageManager::updateAll(['sort' => $post['newIndex']], [
                'id' => $post['stack'][$post['newIndex']]['key']
            ]);
            return true;
        }
        throw new MethodNotAllowedHttpException();
    }
}
