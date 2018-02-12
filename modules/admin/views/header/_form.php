<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Header */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="header-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'header')->hiddenInput(['value' => '1'])->label(false) ?>


    <?= FileInput::widget([
        'name' => 'ImageManager[attachment]',
        'options'=>[
            'multiple'=>true
        ],
        'pluginOptions' => [
            'deleteUrl' => Url::toRoute(['/admin/header/delete-image']),
            'initialPreview'=> $model->imagesLinks,
            'initialPreviewAsData'=>true,
            'overwriteInitial'=>false,
            'initialPreviewConfig'=>$model->imagesLinksData,
            'uploadUrl' => Url::to(['/admin/header/save-img']),
            'uploadExtraData' => [
                'ImageManager[class]' => $model->formName(),
                'ImageManager[item_id]' => 1
            ],
            'maxFileCount' => 10
        ],
        'pluginEvents' => [
            'filesorted' => new \yii\web\JsExpression('function(event, params){
                  $.post("'.Url::toRoute(["/admin/header/sort-image","id"=>$model->id]).'",{sort: params});
            }')
        ],

    ]);?>
    <div class="form-group" style="margin-top: 50px">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
