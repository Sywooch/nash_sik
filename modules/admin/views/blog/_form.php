<?php

use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
    ]);
    ?>
    <?= FileInput::widget([
        'name' => 'ImageManager[attachment]',
        'options'=>[
            'multiple'=>true
        ],
        'pluginOptions' => [
            'deleteUrl' => Url::toRoute(['/admin/blog/delete-image']),
            'initialPreview'=> $model->imagesLinks,
            'initialPreviewAsData'=>true,
            'overwriteInitial'=>false,
            'initialPreviewConfig'=>$model->imagesLinksData,
            'uploadUrl' => Url::to(['/admin/blog/save-img']),
            'uploadExtraData' => [
                'ImageManager[class]' => $model->formName(),
                'ImageManager[item_id]' => (isset($model->id))?$model->id:$model->ids->id+1
            ],
            'maxFileCount' => 1
        ],
        'pluginEvents' => [
            'filesorted' => new \yii\web\JsExpression('function(event, params){
                  $.post("'.Url::toRoute(["/admin/blog/sort-image","id"=>$model->id]).'",{sort: params});
            }')
        ],

    ]);?>

    <div class="form-group" style="margin-top: 50px">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
