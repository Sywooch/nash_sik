<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\About\About */

$this->title = 'Обновить ссылку на видео';
$this->params['breadcrumbs'][] = ['label' => 'О нас', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Обновить ссылку на видео'];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="about-update">
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
