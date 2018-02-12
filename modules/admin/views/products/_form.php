<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->dropDownList(['1.93л' => '1.93л', '0.95л' => '0.95л', '0.2л' => '0.2л']) ?>

    <?= FileInput::widget([
        'name' => 'ImageManager[attachment]',
        'options'=>[
            'multiple'=>true
        ],
        'pluginOptions' => [
            'deleteUrl' => Url::toRoute(['/admin/products/delete-image']),
            'initialPreview'=> $model->imagesLinks,
            'initialPreviewAsData'=>true,
            'overwriteInitial'=>false,
            'initialPreviewConfig'=>$model->imagesLinksData,
            'uploadUrl' => Url::to(['/admin/products/save-img']),
            'uploadExtraData' => [
                'ImageManager[class]' => $model->formName(),
                'ImageManager[item_id]' => $model->id
            ],
            'maxFileCount' => 10
        ],
        'pluginEvents' => [
            'filesorted' => new \yii\web\JsExpression('function(event, params){
                  $.post("'.Url::toRoute(["/admin/products/sort-image","id"=>$model->id]).'",{sort: params});
            }')
        ],

    ]);?>

    <div class="form-group" style="margin-top: 50px">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
