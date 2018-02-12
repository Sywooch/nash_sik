<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Products\Products */

$this->title = 'Обновить продукцию из категории: '. $model->category;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="products-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
