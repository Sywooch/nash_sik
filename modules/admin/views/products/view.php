<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products\Products */

$this->title = 'Продукция из категории: ' . $model->category;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category',
        ],
    ]) ?>
    <hr>
    <?php foreach ($model->images as $one):?>
        <img src="/img/products/<?=$one->name?>" alt="" style="width: 20%;height: 20%;">
    <?php endforeach;?>

</div>
