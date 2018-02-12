<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Header */

$this->title = 'Слайдер';
$this->params['breadcrumbs'][] = ['label' => 'Фотографии на главной', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header-view">


    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php foreach ($model->images as $one):?>
        <img src="/img/header/<?=$one->name?>" alt="" style="width: 30%;height: 30%;">
    <?php endforeach;?>


</div>
