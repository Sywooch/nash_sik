<?php

namespace app\modules\admin\controllers;

use app\models\ImageManager;
use Yii;
use app\models\Header;
use app\models\HeaderSearch;
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
 * ProductsController implements the CRUD actions for Products model.
 */
class HeaderController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    /**
     * Updates an existing Products model.
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
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Header the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Header::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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
                    $imag = imagecreatefrompng($dir . $model->name);
                    $w = imagesx($imag);
                    $h = imagesy($imag);
                    $img2 = imagecreatetruecolor($w, $h);
                    imagealphablending($img2, false);
                    imagesavealpha($img2, true);
                    imagefilledrectangle($img2, 0, 0, $w, $h, imagecolorallocate($img2, 255, 255, 255));
                    imagecopyresampled($img2, $imag, 0, 0, 0, 0, $w, $h, $w, $h);
                    imagepng($img2, $dir . $model->name);
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
        if(($model = ImageManager::findOne(Yii::$app->request->post('key'))) and $model->delete()){
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
                'and',['class'=>'products','item_id'=>$id],$param
            ]);
            ImageManager::updateAll(['sort' => $post['newIndex']], [
                'id' => $post['stack'][$post['newIndex']]['key']
            ]);
            return true;
        }
        throw new MethodNotAllowedHttpException();
    }
}
