<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Header */

$this->title = 'Обновить фотографии';
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Слайдер'];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="header-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
