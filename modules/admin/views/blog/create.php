<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = 'Добавитьновость';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
</div>
