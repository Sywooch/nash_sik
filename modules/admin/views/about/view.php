<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\About\About */

$this->title = 'Ссылка на видео';
$this->params['breadcrumbs'][] = ['label' => 'Видео', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-view">


    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'link',
        ],
    ]) ?>

</div>
